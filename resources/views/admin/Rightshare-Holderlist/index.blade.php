@extends('admin.master')
@section('title', Request::segment(2))
@section('breadcrumb')
    <a href="admin/rightshare_holderlist/create" class="btn btn-primary btn-sm">Create</a>
    <a href="" data-toggle="modal" data-target=".team-details"class="btn btn-primary btn-sm">Upload CSV</a>
     <a href="admin/rightshare_holderlist/delete/all" onclick="return confirm('Do you want to Delete All?')" class="btn btn-primary btn-sm">Delete All</a>
    @endsection
@section('content')
<section id="" class="table-layout animated fadeIn">
  <!-- begin: .tray-center -->
  <div class=""> 
   <h4>Rightshare Holderlist</h4>
   <!-- recent orders table -->
   <div class="panel">
    <div class="panel-body pn">
      <div class="table-responsive">
        <table class="table admin-form table-striped dataTable" id="datatable3">
          <thead>
            <tr class="bg-light">
              <th>SN</th>
                <th>Share Holder No.</th>                            
                <th>Name</th>                            
                <th></th>                            
                <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
           @if(count($data) > 0)              
              @foreach($data as $row)
              <tr class="id{{$row->id}}">
                <td>{{$loop->iteration}}</td>
                <td>{{ $row->shholderno }}</td>
                
                <td>{{ $row->full_name }}</td>
                
                <td></td>
                <td class="text-center">  
                  <a href="{{ url('admin/rightshare_holderlist/'.$row->id.'/edit') }}">Edit</a>|
                  <a href="{{ url('admin/rightshare_holderlist/'.$row->id.'/destroy') }}" onclick="return confirm('Confirm Delete?')"  class="btn-delete">
                    Delete
                  </a>
                </td>
              </tr>
              @endforeach
              @endif  

            </tbody>
          </table>
        </div>
      </div>
    </div>
    {{$data->links()}}
  </div>
  <!-- end: .tray-center -->
</section>
<div class="modal fade team-details"  tabindex="-1" role="dialog"   aria-hidden="true">
   <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">

         <div class="modal-body p-0 modal-team-body">
           
           
            <div class="modal-team-details">
               
               <div class="text-center">
                <form method="POST" action="{{ url('admin/rightshare_holderlist/upload_csv') }}" enctype="multipart/form-data">
                   {{ csrf_field() }}
                 <input type="file" name="file" /><br>
                   <input type="submit" class="form-control btn btn-primary" name="submit" value="Import" />
               </form>
                  <hr>
                  <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-close"></i></button>
               </div>

               
            </div>

           
         </div>
          
      </div>
   </div>
</div>
@endsection
@section('libraries')
<script src="{{asset(env('PUBLIC_PATH').'vendor/plugins/datatables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{asset(env('PUBLIC_PATH').'vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>
<script src="{{asset(env('PUBLIC_PATH').'vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')}}"></script>
<script src="{{asset(env('PUBLIC_PATH').'vendor/plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript">


/********/
  // $('document').ready(function(){
  //   $('#checkAll').on('click',function(e){
  //     if($(this).is(':checked', true)){
  //       $('.check_box').prop('checked', true);
  //     }else{
  //       $('.check_box').prop('checked', false);
  //     }
  //   });
  //   $('.deleteAll').on(function(){

  //   });
  // });


  /************/
  $('#datatable3').dataTable({
    "aoColumnDefs": [{
      'bSortable': true,
      'aTargets': [-1]

    }],
    "oLanguage": {
      "oPaginate": {
        "sPrevious": "Previous",
        "sNext": "Next"
      }
    },
    "iDisplayLength": 1000,
    "aLengthMenu": [
    [5, 10, 25, 50, -1],
    [5, 10, 25, 50, "All"]
    ],
    "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
    "oTableTools": {
      "sSwfPath": "{{asset(env('PUBLIC_PATH'))}}vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
    }
  });

</script>

@endsection