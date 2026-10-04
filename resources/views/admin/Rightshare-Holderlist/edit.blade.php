@extends('admin.master')
@section('title','Banner')
@section('breadcrumb')
     <a href="admin/rightshare_holderlist" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')

<form class="form-horizontal" role="form" action="{{ url('admin/'.Request::segment(2).'/'.$data->id) }}" method="post" enctype="multipart/form-data">
           {{ csrf_field() }}  
            <input type="hidden" name="_method" value="PUT" />       
<div class="col-md-9">
            <!-- Input Fields -->
            <div class="panel">
              <div class="panel-heading">
                <span class="panel-title">Edit Rightshare Holderlist</span>
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
                    <label for="inputStandard" class="col-lg-3 control-label">Share Holder No.</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="shholderno" class="form-control" placeholder="" value="{{$data->shholderno}}"/>
                      </div>
                    </div>
                  </div>

                      <div class="form-group">
                    <label class="col-lg-3 control-label" for="videolink">First Name</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="fname" placeholder="" value="{{$data->fname}}"/> <br />                       
                      </div>
                    </div>
                  </div> 
               
              <div class="form-group">
                    <label class="col-lg-3 control-label" for="link">Last Name</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="lname" value="{{$data->lname}}"/> <br />                       
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="col-lg-3 control-label" for="link">Full Name</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="full_name"  value="{{$data->full_name}}"/> <br />                       
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="link">Total kitta</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="total_kitta"  value="{{$data->total_kitta}}"/> <br />                       
                      </div>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="link">Tfrackitta</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="tfrackitta"  value="{{$data->tfrackitta}}"/> <br />                       
                      </div>
                    </div>
                  </div>  
                   <div class="form-group">
                    <label class="col-lg-3 control-label" for="link">Total</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="total"  value="{{$data->total}}"/> <br />                       
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
            <div class="sid_ mb10">
            <div class="hd_show_con">                                     
             Actual Rights <br><input type="text" class="form-control" name="actual_rights" value="{{$data->actual_rights}}"/> <br>
                                     
            </div>
          </div> 
           <div class="sid_ mb10">
            <div class="hd_show_con">                                     
             Int Rights<br> <input type="text" class="form-control" name="int_rights" value="{{$data->int_rights}}"/><br>
                                     
            </div>
          </div>  
           <div class="sid_ mb10">
            <div class="hd_show_con">                                     
             Fraction <br><input type="text" class="form-control" name="fraction" value="{{$data->fraction}}"/> <br>
                                     
            </div>
          </div> 
           <div class="sid_ mb10">
            <div class="hd_show_con">                                     
             Upper<br> <input type="text" class="form-control" name="upper" value="{{$data->upper}}"/> <br>
                                     
            </div>
          </div>
           <div class="sid_ mb10">
            <div class="hd_show_con">                                     
             Actual Issue <br><input type="text" class="form-control" name="actual_issue" value="{{$data->actual_issue}}"/> <br>
                                     
            </div>
          </div>  
          <div class="sid_ mb10">
            <div class="hd_show_con">                                     
            Occupation <br><input type="text" class="form-control" name="occupation" value="{{$data->occupation}}"/> <br>
                                     
            </div>
          </div> 
          <div class="sid_ mb10">
            <div class="hd_show_con">                                     
           Type <br><input type="text" class="form-control" name="type" value="{{$data->type}}"/> <br>
                                     
            </div>
          </div> 
       </div>         

     </div>
          
          </form>
@endsection