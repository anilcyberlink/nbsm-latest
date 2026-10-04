@extends('admin.master')
@section('title','Banner')
@section('breadcrumb')
     <a href="admin/taxliability_holderlist" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')

<form class="form-horizontal" role="form" action="{{ url('admin/taxliability_holderlist') }}" method="post" enctype="multipart/form-data">
           {{ csrf_field() }}         
<div class="col-md-9">
            <!-- Input Fields -->
            <div class="panel">
              <div class="panel-heading">
                <span class="panel-title">New Taxliability Eligibilty</span>
              </div>
              <div class="panel-body"> 
             
                  <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Company</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        
                        <select name="company" class="form-control">
                          <option value="0"> Select Company </option>
                          @if($data)                  
                          @foreach($data as $row)
                          <option value="{{$row->id}}"> {{$row->company}}</option>
                          @endforeach  
                          @endif 
                        </select>
                        
                      </div>
                    </div>
                  </div>
                  

                      <div class="form-group">
                    <label class="col-lg-3 control-label" for="videolink">Share Holder No.</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="shholderno" placeholder="" /> <br />                       
                      </div>
                    </div>
                  </div> 
               
             

                   <div class="form-group">
                    <label class="col-lg-3 control-label" for="link">Full Name</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="full_name"  /> <br />                       
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="link">Bonus Issued</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="issue_bonus"  /> <br />                       
                      </div>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="link">Roundedup Bonus Tax Kitta</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="rounded_up_bonus_tax"  /> <br />                       
                      </div>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="link">Remarks</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="remarks"  /> <br />                       
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