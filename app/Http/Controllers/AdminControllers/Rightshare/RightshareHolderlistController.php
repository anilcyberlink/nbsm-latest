<?php

namespace App\Http\Controllers\AdminControllers\Rightshare;
use Illuminate\Support\Facades\Session;
use App\Models\RightShare\RightshareCompanyModel;
use App\Models\RightShare\RightshareHolderlistModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class RightshareHolderlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RightshareHolderlistModel::orderBy('id','desc')->paginate(1000);
        return view('admin.Rightshare-Holderlist.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data = RightshareCompanyModel::all();
        return view('admin.Rightshare-Holderlist.create', compact('data'));
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
    $data = RightshareHolderlistModel::create($req);
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
         $data = RightshareHolderlistModel::find($id);
          $company = RightshareCompanyModel::all();
         return view('admin.Rightshare-Holderlist.edit', compact('data','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RightshareHolderlistModel $rightshareHolderlistModel, $id)
    {
        $data = RightshareHolderlistModel::find($id);        
        
       $data->company = $request->company;
        $data->shholderno = $request->shholderno;
         $data->fname = $request->fname;
         $data->lname = $request->lname;
          $data->full_name = $request->full_name;
             $data->total_kitta = $request->total_kitta;
              $data->tfrackitta = $request->tfrackitta;
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
        $data = RightshareHolderlistModel::find($id);
       
         $data->delete();
         return redirect()->back()->with('message','Deleted Successful.');
    }

     public function delete_all()
    {      
         RightshareHolderlistModel::truncate();
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
               "fname"=>$importData[3],
               "lname"=>$importData[4],
              "full_name"=>$importData[5],
              "occupation"=>$importData[6],
               "total_kitta"=>$importData[7],
               "tfrackitta"=>$importData[8],
                "total"=>$importData[9],
               "actual_rights"=>$importData[10],
               "int_rights"=>$importData[11],
               "fraction"=>$importData[12],
                "upper"=>$importData[13],
               "actual_issue"=>$importData[14],               
               "type"=>$importData[15]
           );

            RightshareHolderlistModel::insertData($insertData);

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
