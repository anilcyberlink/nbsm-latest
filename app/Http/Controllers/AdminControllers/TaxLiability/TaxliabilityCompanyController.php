<?php

namespace App\Http\Controllers\AdminControllers\TaxLiability;
use App\Models\Taxliability\TaxliabilityCompanyModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class TaxliabilityCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = TaxliabilityCompanyModel::orderBy('id','desc')->get();
        return view('admin.Taxliability-Company.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.Taxliability-Company.create');
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
    $data = TaxliabilityCompanyModel::create($req);
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
        $data = TaxliabilityCompanyModel::find($id);
         return view('admin.Taxliability-Company.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TaxliabilityCompanyModel $rightshareCompanyModel, $id)
    {
         
        $data = TaxliabilityCompanyModel::find($id);        
        
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
      $data = TaxliabilityCompanyModel::find($id);
       
         $data->delete();
         return redirect()->back()->with('message','Deleted Successful.'); 
    }
}