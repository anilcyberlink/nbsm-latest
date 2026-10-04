<?php

namespace App\Http\Controllers\AdminControllers\Rightshare;
use App\Models\RightShare\RightshareCompanyModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class RightshareCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = RightshareCompanyModel::orderBy('id','desc')->get();
        return view('admin.Rightshare-Company.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.Rightshare-Company.create');
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
    $data = RightshareCompanyModel::create($req);
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
        $data = RightshareCompanyModel::find($id);
         return view('admin.Rightshare-Company.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RightshareCompanyModel $rightshareCompanyModel, $id)
    {
         
        $data = RightshareCompanyModel::find($id);        
        
           $data->company = $request->company;
           $isChecked = $request->has('status');       
             $data['status'] = ($isChecked)?'1':'0';
          
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
      $data = RightshareCompanyModel::find($id);
       
         $data->delete();
         return redirect()->back()->with('message','Deleted Successful.'); 
    }
}
