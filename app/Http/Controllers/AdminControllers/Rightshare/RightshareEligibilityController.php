<?php

namespace App\Http\Controllers\AdminControllers\Rightshare;
use Illuminate\Support\Facades\Session;
use App\Models\RightShare\RightshareCompanyModel;
use App\Models\RightShare\RightshareEligibilityModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class RightshareEligibilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = RightshareEligibilityModel::orderBy('id','desc')->paginate(1000);
        return view('admin.Rightshare-Eligibility.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
      $data = RightshareCompanyModel::all();
        return view('admin.Rightshare-Eligibility.create', compact('data'));
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
    $data = RightshareEligibilityModel::create($req);
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
         $data = RightshareEligibilityModel::find($id);
         $company = RightshareCompanyModel::all();
         return view('admin.Rightshare-Eligibility.edit', compact('data','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RightShareEligibilityModel $rightshareEligibilityModel, $id)
    {
        $data = RightshareEligibilityModel::find($id);        
        
       $data->company = $request->company;
        $data->shholderno = $request->shholderno;
         $data->boid = $request->boid;
          $data->full_name = $request->full_name;
           $data->kitta = $request->kitta;
            $data->remaining_kitta = $request->remaining_kitta;
             $data->total_kitta = $request->total_kitta;
              $data->t_frac_kitta = $request->t_frac_kitta;
               $data->total = $request->total;
                $data->actual_rights = $request->actual_rights;
                 $data->int_rights = $request->int_rights;
                  $data->fraction = $request->fraction;
                   $data->upper = $request->upper;
                   $data->actual_issue = $request->actual_issue;
                    $data->occupation = $request->occupation;
                     $data->type = $request->type;
          
          
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
        $data = RightshareEligibilityModel::find($id);
       
         $data->delete();
         return redirect()->back()->with('message','Deleted Successful.');
    }

     public function delete_all()
    {      
         RightshareEligibilityModel::truncate();
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
               "shholderno"=>$importData[2],
               "boid"=>$importData[3],
               "full_name"=>$importData[4],
              "kitta"=>$importData[5],
               "remaining_kitta"=>$importData[6],
               "total_kitta"=>$importData[7],
               "t_frac_kitta"=>$importData[8],
                "total"=>$importData[9],
               "actual_rights"=>$importData[10],
               "int_rights"=>$importData[11],
               "fraction"=>$importData[12],
                "upper"=>$importData[13],
               "actual_issue"=>$importData[14],
               "occupation"=>$importData[15],
               "type"=>$importData[16]
           );

            RightshareEligibilityModel::insertData($insertData);

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
