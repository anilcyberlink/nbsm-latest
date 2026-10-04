@extends('admin.master')
@section('title','Banner')
@section('breadcrumb')
     <a href="admin/rightshare_holderlist" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')

<form class="form-horizontal" role="form" action="{{ url('admin/rightshare_holderlist') }}" method="post" enctype="multipart/form-data">
           {{ csrf_field() }}         
<div class="col-md-9">
            <!-- Input Fields -->
            <div class="panel">
              <div class="panel-heading">
                <span class="panel-title">New Rightshare Holderlist</span>
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
                    <label for="inputStandard" class="col-lg-3 control-label">Share Holder No.</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="shholderno" class="form-control" placeholder="" />
                      </div>
                    </div>
                  </div>

                      <div class="form-group">
                    <label class="col-lg-3 control-label" for="videolink">First Name</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="fname" placeholder="" /> <br />                       
                      </div>
                    </div>
                  </div> 
                    <div class="form-group">
                    <label class="col-lg-3 control-label" for="link">Last Name</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="lname"  /> <br />                       
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
                    <label class="col-lg-3 control-label" for="link">Total kitta</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="total_kitta"  /> <br />                       
                      </div>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="link">Tfrackitta</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="tfrackitta"  /> <br />                       
                      </div>
                    </div>
                  </div>  
                   <div class="form-group">
                    <label class="col-lg-3 control-label" for="link">Total</label>
                    <div class="col-lg-8">
                      <div class="bs-component">
                        <input type="text" class="form-control" name="total"  /> <br />                       
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
             Actual Rights <br><input type="text" class="form-control" name="actual_rights" /> <br>
                                     
            </div>
          </div> 
           <div class="sid_ mb10">
            <div class="hd_show_con">                                     
             Int Rights<br> <input type="text" class="form-control" name="int_rights" /><br>
                                     
            </div>
          </div>  
           <div class="sid_ mb10">
            <div class="hd_show_con">                                     
             Fraction <br><input type="text" class="form-control" name="fraction" /> <br>
                                     
            </div>
          </div> 
           <div class="sid_ mb10">
            <div class="hd_show_con">                                     
             Upper<br> <input type="text" class="form-control" name="upper"/> <br>
                                     
            </div>
          </div>
           <div class="sid_ mb10">
            <div class="hd_show_con">                                     
             Actual Issue <br><input type="text" class="form-control" name="actual_issue" /> <br>
                                     
            </div>
          </div> 
           <div class="sid_ mb10">
            <div class="hd_show_con">                                     
            Occupation <br><input type="text" class="form-control" name="occupation" /> <br>
                                     
            </div>
          </div> 
           <div class="sid_ mb10">
            <div class="hd_show_con">                                     
             Type<br><input type="text" class="form-control" name="type" /> <br>
                                     
            </div>
          </div>  
          
       </div>         

     </div>
          
          </form>
@endsection