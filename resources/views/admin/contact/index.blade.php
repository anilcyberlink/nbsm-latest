@extends('admin.master')

@section('title', 'Contact')

@section('content')

    <section class="table-layout animated fadeIn">
        <div class="panel">

            <div class="panel-heading">
                <span class="panel-title">
                    <i class="fa fa-envelope"></i>
                    Contact Enquiries
                </span>
            </div>

            <div class="panel-body pn">
                <div class="table-responsive">

                    <table class="table admin-form table-striped dataTable" id="datatable3">

                        <thead>
                            <tr>
                                <th class="text-center">SN</th>
                                <th>Detail</th>
                                <th>Company</th>
                                <th>Message</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ ucfirst($row->first_name) }}
                                        {{ ucfirst($row->last_name) }}
                                        <br>
                                        {{ $row->contact }}
                                        <br>
                                        {{ $row->email }}
                                    </td>

                                    <td>{{ $row->company }}</td>

                                    <td><textarea readonly>{{ $row->comments }}</textarea></td>

                                    <td class="text-center">
                                        <a href="{{ route('contact-delete', $row->id) }}" class="btn btn-danger btn-xs"
                                            onclick="return confirm('Confirm Delete?')">
                                            <i class="fa fa-trash"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>

        </div>
    </section>

@endsection


@section('libraries')

    <!-- Datatables -->
    <script src="{{ asset(env('PUBLIC_PATH')) }}vendor/plugins/datatables/media/js/jquery.dataTables.js"></script>

    <!-- Datatables Tabletools addon -->
    <script
        src="{{ asset(env('PUBLIC_PATH')) }}vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js">
    </script>

    <!-- Datatables ColReorder addon -->
    <script
        src="{{ asset(env('PUBLIC_PATH')) }}vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js">
    </script>

    <!-- Datatables Bootstrap Modifications -->
    <script src="{{ asset(env('PUBLIC_PATH')) }}vendor/plugins/datatables/media/js/dataTables.bootstrap.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

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

                "iDisplayLength": 10,

                "aLengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],

                "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',

                "oTableTools": {
                    "sSwfPath": "{{ asset(env('PUBLIC_PATH')) }}vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
                }

            });

        });
    </script>

@endsection
