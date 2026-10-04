@extends('admin.master')

@section('title', Request::segment(2))
@section('breadcrumb')
    <a href="{{ route('our-trades.create') }}" class="nbms-btn-primary btn-sm">
        <i class="fa fa-plus"></i> Create
    </a>
@endsection

@section('content')

    <section class="table-layout animated fadeIn trades-page">

        <div class="trades-container">

            {{-- Page Header --}}
            <div class="trades-header">

                <div>
                    <h3>
                        <i class="fa fa-briefcase"></i>
                        Trades
                    </h3>

                    <p>
                        Manage your trades and related information
                    </p>
                </div>

            </div>


            {{-- Table --}}
            <div class="panel trades-table-panel">

                <div class="panel-body pn">

                    <div class="table-responsive">

                        <table class="table admin-form table-striped dataTable trades-table" id="datatable3">

                            <thead>

                                <tr class="bg-light">

                                    <th class="text-center">
                                        SN
                                    </th>

                                    <th>
                                        Trade
                                    </th>

                                    <th class="text-center">
                                        Associated
                                    </th>

                                    <th class="text-center">
                                        Order
                                    </th>

                                    <th class="text-center">
                                        Actions
                                    </th>

                                    <th>
                                        Published
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @if ($data->count() > 0)

                                    @foreach ($data as $row)
                                        <tr class="id{{ $row->id }}">

                                            <td class="text-center">
                                                {{ $loop->iteration }}
                                            </td>


                                            <td class="post_title title_hi_sh trades-title">

                                                <strong>
                                                    {{ $row->title }}
                                                </strong>

                                                <div class="row_actions">

                                                    <span class="id">
                                                        ID: {{ $row->id }} |
                                                    </span>

                                                    <span class="edit">

                                                        <a
                                                            href="{{ url('admin/' . Request::segment(2) . '/' . $row->id . '/edit') }}">
                                                            Edit
                                                        </a>

                                                    </span>

                                                    <span class="trash">

                                                        <a href="#{{ $row->id }}" class="submitdelete1">
                                                            Delete
                                                        </a>

                                                    </span>

                                                </div>

                                            </td>


                                            <td class="text-center">

                                                <a href="{{ url('admin/associates/' . Request::segment(2) . '/' . $row->id) }}"
                                                    title="Associated posts" class="trades-icon-link">
                                                    <i class="fa fa-list-ol"></i>
                                                </a>

                                            </td>


                                            <td class="categories text-center">

                                                {{ $row->ordering }}

                                            </td>


                                            <td class="text-center trades-actions">

                                                <?php /* ?> ?>

                                                <a href="{{ route('doc.multipledocument', $row->id) }}" title="PDF">
                                                    <i class="fa fa-file-pdf-o"></i>
                                                </a>

                                                <a href="{{ route('admin.multiplephoto', $row->id) }}" title="Photo">
                                                    <i class="fa fa-picture-o"></i>
                                                </a>

                                                <a href="{{ url('admin/multiplevideo/' . $row->id) }}" title="Video">
                                                    <i class="fa fa-video-camera"></i>
                                                </a>

                                                <?php */ ?>

                                                <span class="text-muted">
                                                    —
                                                </span>

                                            </td>


                                            <td class="date">

                                                {{ $row->created_at }}

                                            </td>

                                        </tr>
                                    @endforeach

                                @endif

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection


@section('libraries')

    <!-- Datatables -->
    <script src="{{ asset(env('PUBLIC_PATH') . 'vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>

    <!-- Datatables Tabletools addon -->
    <script
        src="{{ asset(env('PUBLIC_PATH') . 'vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}">
    </script>

    <!-- Datatables ColReorder addon -->
    <script
        src="{{ asset(env('PUBLIC_PATH') . 'vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}">
    </script>

    <!-- Datatables Bootstrap Modifications -->
    <script src="{{ asset(env('PUBLIC_PATH') . 'vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>


    <script type="text/javascript">
        (function($) {

            $('.submitdelete1').on('click', function(e) {

                e.preventDefault();

                if (confirm('Are you sure to delete??')) {

                    var csrf = $('meta[name="csrf-token"]').attr('content');

                    var str = $(this).attr('href');

                    var id = str.slice(1);

                    $.ajax({

                        type: 'delete',

                        url: "{{ url('admin') . '/' . Request::segment(2) . '/' }}" + id,

                        data: {
                            _token: csrf
                        },

                        success: function(data) {

                            $('tbody tr.id' + id).remove();

                        },

                        error: function(data) {

                            alert('Error occurred!');

                        }

                    });

                }

            });

        }(jQuery));


        /********/

        $('document').ready(function() {

            $('#checkAll').on('click', function(e) {

                if ($(this).is(':checked', true)) {

                    $('.check_box').prop('checked', true);

                } else {

                    $('.check_box').prop('checked', false);

                }

            });

            $('.deleteAll').on(function() {

            });

        });


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
    </script>

@endsection
