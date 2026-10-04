<?php

namespace App\Http\Controllers\AdminControllers\TaxLiability;
use Illuminate\Support\Facades\Session;
use App\Models\Taxliability\TaxliabilityCompanyModel;
use App\Models\Taxliability\TaxliabilityEligibilityModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class TaxliabilityEligibilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = TaxliabilityEligibilityModel::orderBy('id','desc')->paginate(1000);
        return view('admin.Taxliability-Eligibility.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
      $data = TaxliabilityCompanyModel::all();
        return view('admin.Taxliability-Eligibility.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req = $request->all();
    $data = TaxliabilityEligibilityModel::create($req);
    if($data){
        return redirect()->back()->with('message','Successfully added.');
    }else{
        return "Error";
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = TaxliabilityEligibilityModel::find($id);
         $company = TaxliabilityCompanyModel::all();
         return view('admin.Taxliability-Eligibility.edit', compact('data','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TaxliabilityEligibilityModel $taxliabilityEligibilityModel, $id)
    {
        $data = TaxliabilityEligibilityModel::find($id);        
        
       $data->company = $request->company;       
         $data->boid = $request->boid;
          $data->full_name = $request->full_name;
           $data->bonus_issued = $request->bonus_issued;
            $data->rounded_up_bonus_tax = $request->rounded_up_bonus_tax;
             $data->remarks = $request->remarks;         
          
           $data->save();
           
                return redirect()->back()->with('message','Update Successful.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = TaxliabilityEligibilityModel::find($id);
       
         $data->delete();
         return redirect()->back()->with('message','Deleted Successful.');
    }

     public function delete_all()
    {      
         TaxliabilityEligibilityModel::truncate();
         return redirect()->back()->with('message','Delete Successful.');
    }

    public function upload_csv(Request $request)
    {
      
        if ($request->input('submit') != null ){

      $file = $request->file('file'); 

      // File Details 
      $filename = $file->getClientOriginalName();
      $extension = $file->getClientOriginalExtension();
      $tempPath = $file->getRealPath();
      $fileSize = $file->getSize();
      $mimeType = $file->getMimeType();

      // Valid File Extensions
      $valid_extension = array("csv"); 

      // 2MB in Bytes
      $maxFileSize = 8097152; 
      
      // Check file extension
      if(in_array(strtolower($extension),$valid_extension)){

        // Check file size
        if($fileSize <= $maxFileSize){

          // File upload location
          $location = 'csv-uploads';

          // Upload file
          $file->move($location,$filename);

          // Import CSV to Database
          $filepath = public_path($location."/".$filename);

          // Reading file
          $file = fopen($filepath,"r"); 

          $importData_arr = array();
         
          $i = 0;

          while (($filedata = fgetcsv($file, 100000, ",")) !== FALSE) {
             $num = count($filedata );
             
             // Skip first row (Remove below comment if you want to skip the first row)
             /*if($i == 0){
                $i++;
                continue; 
             }*/
             for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata [$c];
             }
             $i++;
          }
          fclose($file);

          // Insert to MySQL database
          foreach($importData_arr as $importData){

            $insertData = array(
               "company"=>$importData[1],
               "boid"=>$importData[2],
               "full_name"=>$importData[3],
               "bonus_issued"=>$importData[4],
              "rounded_up_bonus_tax"=>$importData[5],
               "remarks"=>$importData[6],
               
           );

            TaxliabilityEligibilityModel::insertData($insertData);

          }

          Session::flash('message','Import Successful.');
        }else{
          Session::flash('message','File too large. File must be less than 2MB.');
        }

      }else{
         Session::flash('message','Invalid File Extension.');
      }

    }

    // Redirect to index
     return redirect()->back()->with('message','Import Successful.'); 
  }

}
