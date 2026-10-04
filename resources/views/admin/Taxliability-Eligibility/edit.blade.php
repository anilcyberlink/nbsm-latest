@extends('admin.master')
@section('title','Banner')
@section('breadcrumb')
     <a href="admin/taxliability_eligibility" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')

<form class="form-horizontal" role="form" action="{{ url('admin/'.Request::segment(2).'/'.$data->id) }}" method="post" enctype="multipart/form-data">
           {{ csrf_field() }}  
            <input type="hidden" name="_method" value="PUT" />       
<div class="col-md-9">
            <!-- Input Fields -->
            <div class="panel">
              <div class="panel-heading">
                <span class="panel-title">Edit Taxliability Eligibilty</span>
              </div>
              <div class="panel-body"> 
             
                  <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Company</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        
                        <select name="company" class="form-control">
                          <option value="0"> Select Company </option>
                          @if($company)
                          @foreach($company as $row)
                          <option value="{{$row->id}}" {{ ($row->id == $data->company )?'selected':'' }}> {{$row->company}}</option>
                          @endforeach  
                          @endif 
                        </select>
                        
                      </div>
                    </div>
                  </div>
                  

                      <div class="form-group">
                    <label class="col-lg-3 control-label" for="videolink">BOID</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="boid" value="{{$data->boid}}" /> <br />                       
                      </div>
                    </div>
                  </div> 
               
             

                   <div class="form-group">
                    <label class="col-lg-3 control-label" for="link">Full Name</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="full_name" value="{{$data->full_name}}"  /> <br />                       
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="link">Bonus Issued</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="bonus_issued"  value="{{$data->bonus_issued}}" /> <br />                       
                      </div>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="link">Roundedup Bonus Tax Kitta</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="rounded_up_bonus_tax" value="{{$data->rounded_up_bonus_tax}}"  /> <br />                       
                      </div>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="link">Remarks</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="remarks" value="{{$data->remarks}}"  /> <br />                       
                      </div>
                    </div>
                  </div> 
                  
                
              </div>
            </div>          
          </div>
     
          <div class="col-md-3">
        <div class="admin-form">
          <div class="sid_ mb10">                   
            <div class="hd_show_con">
                               
            </div>
            <footer>                        
              <div id="publishing-action">
                <input type="submit" class="btn btn-primary btn-sm" value="Publish" />
              </div>
              <div class="clearfix"></div>
            </footer>
            <div class="clearfix"></div>
          </div>          
           
       </div>         

     </div>
          </form>
@endsection