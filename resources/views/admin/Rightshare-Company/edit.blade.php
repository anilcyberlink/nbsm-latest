@extends('admin.master')
@section('title','Banner')
@section('breadcrumb')
     <a href="admin/rightshare_company" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')

<form class="form-horizontal" role="form" action="{{ url('admin/'.Request::segment(2).'/'.$data->id) }}" method="POST" enctype="multipart/form-data">
           {{ csrf_field() }}         
<div class="col-md-12">
            <!-- Input Fields -->
            <div class="panel">
              <div class="panel-heading">
                <span class="panel-title">New Rightshare Company</span>
              </div>
              <div class="panel-body"> 
             
                  <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label">Company</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="text" id="inputStandard" name="company" class="form-control" value="{{$data->company}}"/>
                        <input name="_method" type="hidden" value="PATCH">
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="inputStandard" class="col-lg-3 control-label"> Show in home</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="checkbox" name="status" value="{{ $data->status }}" {{ ($data->status == 1)?'checked':'' }} /> Enable/Disable <br>
                      </div>
                    </div>
                  </div>             
                 
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for=""></label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="submit" class="form-control btn btn-primary" name="submit" value="Submit" />
                      </div>
                    </div>
                  </div> 
                
              </div>
            </div>          
          </div>

          
          </form>
@endsection