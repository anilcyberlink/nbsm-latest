@extends('admin.master')
@section('title', Request::segment(2))
@section('breadcrumb')

    @if (Request::segment(3))
        <a href="{{ route('admin.post.index', Request::segment(2)) }}" class="nbms-btn-secondary btn-sm">
            <i class="fa fa-arrow-left"></i>
            Go Back
        </a>
    @endif

    <a href="{{ route('admin.post.create', Request::segment(2)) }}" class="nbms-btn-primary btn-sm">
        <i class="fa fa-plus"></i>
        Create
    </a>

@endsection
@section('content')
    <section id="" class="table-layout animated fadeIn">
        <!-- begin: .tray-center -->
        <div class="">
            <div class="nbms-page-header">

                <div>
                    <h2 class="nbms-page-title">
                        <i class="fa fa-files-o"></i>
                        {{ posttype(Request::segment(2))->post_type }}
                    </h2>

                    <p class="nbms-page-subtitle">
                        Manage {{ strtolower(posttype(Request::segment(2))->post_type) }}
                        content
                    </p>

                    @if (Request::segment(2) == 'resources' && Request::segment(3) != '')
                        <div class="nbms-page-notice">
                            <i class="fa fa-info-circle"></i>

                            You can only have 3 items shown on the home page under
                            <strong>Resources</strong>.
                            More than 3 will automatically remove the oldest item.

                            <br>

                            <a href="{{ route('admin.resource.home.list', 'resources') }}">
                                View items shown on home
                            </a>
                        </div>
                    @endif

                </div>

            </div>
            <!-- recent orders table -->
            <div class="panel">
                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table admin-form table-striped dataTable" id="datatable3">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-center"> SN </th>
                                    <th>Post Name</th>
                                    <!-- <th class="text-center">GP</th>    -->
                                    <th class="text-center">Status</th>
                                    @if (Request::segment(2) == 'resources' && Request::segment(3) != '')
                                        <th class="text-center">Show_in_home</th>
                                    @endif
                                    <th class="text-center">Visiter</th>
                                    <th class="text-center">Order</th>
                                    <th class="text-center"> &nbsp; </th>
                                    <th>Published </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr class="id{{ $row->id }}">
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="post_title title_hi_sh">
                                            @if (check_child_post($row->id))
                                                <strong> {{ $row->post_title }} </strong>
                                                <a href="{{ url('admin/' . Request::segment(2) . '/' . $row->id) }}"> <i
                                                        class="fa fa-list" aria-hidden="true"></i> </a>
                                            @else
                                                <strong> {{ $row->post_title }} </strong>
                                            @endif
                                            <div class="row_actions"><span class="id">ID: {{ $row->id }} |
                                                </span><span class="edit"><a
                                                        href="{{ url('admin/' . Request::segment(2) . '/' . $row->id . '/edit') }}">
                                                        Edit
                                                    </a>
                                                </span>
                                                @if (!check_child_post($row->id) > 0)
                                                    | <span class="trash"><a href="#{{ $row->id }}"
                                                            class="submitdelete1">
                                                            Delete
                                                        </a>
                                                    </span>
                                                @endif
                                        </td>

                                        <td class="text-center">
                                            <input class="CheckStatus" type="checkbox" name="status"
                                                data-rowid="{{ $row->id }}"
                                                {{ $row->status == 1 ? 'checked' : '' }} />
                                        </td>
                                        @if (Request::segment(2) == 'resources' && Request::segment(3) != '')
                                            <td class="text-center">
                                                <input class="checkShowInHome" type="checkbox" name="show_in_home"
                                                    data-rowid="{{ $row->id }}"
                                                    {{ $row->show_in_home == 1 ? 'checked' : '' }} />
                                            </td>
                                        @endif
                                        <?php /*?> ?> ?>
                                        <td class="text-center"> <input class="GlobalPost" type="checkbox"
                                                name="global_post" data-rowid="{{ $row->id }}"
                                                {{ $row->global_post == 1 ? 'checked' : '' }} /> </td>
                                        <?php */?>
                                        <td class="text-center">{{ $row->visiter }}</td>

                                        <td class="categories text-center">
                                            {{ $row->post_order }}
                                        </td>

                                        <td>
                                            <a href="{{ url('admin/associated/' . Request::segment(2) . '/' . $row->id) }}"
                                                title="Associated posts">
                                                <i class="fa fa-list-ol"></i>
                                            </a>
                                            <?php /*?> ?> ?>
                                            <a href="{{ route('admin.multiplephoto.index', $row->id) }}" title="Photo">
                                                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('admin.multiplevideo.index', $row->id) }}" title="Video">
                                                <i class="fa fa-file-video-o" aria-hidden="true"></i>
                                            </a>

                                            <a href="{{ route('doc.multipledocument', $row->id) }}" title="PDF">
                                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                            </a>
                                            <?php */?>


                                        </td>
                                        <td class="date"> {{ $row->created_at }} </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: .tray-center -->
    </section>
@endsection
@section('libraries')
    <script src="{{ asset('/vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script src="{{ asset('/vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script> //
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

            //
            $('.CheckStatus').on('click', function(e) {
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var id = $(this).attr('data-rowid');
                var url = '{{ route('admin.poststatus', ['id' => ':id']) }}';
                url = url.replace(':id', id);
                $.ajax({
                    type: 'put',
                    url: url,
                    data: {
                        _token: csrf
                    },
                    success: function(data) {
                        colsole.log(data);
                    },
                    error: function(data) {
                        colsole.log(data);
                    }
                });
            });

            $('.checkShowInHome').on('click', function(e) {
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var id = $(this).attr('data-rowid');
                var url = '{{ route('admin.post.home', ['id' => ':id']) }}';
                url = url.replace(':id', id);
                $.ajax({
                    type: 'put',
                    url: url,
                    data: {
                        _token: csrf
                    },
                    success: function(data) {
                        colsole.log(data);
                    },
                    error: function(data) {
                        colsole.log(data);
                    }
                });
            });

            //
            $('.GlobalPost').on('click', function(e) {
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var id = $(this).attr('data-rowid');
                var url = '{{ route('admin.globalpost', ['id' => ':id']) }}';
                url = url.replace(':id', id);
                $.ajax({
                    type: 'put',
                    url: url,
                    data: {
                        _token: csrf
                    },
                    success: function(data) {
                        colsole.log('success');
                    },
                    error: function(data) {
                        colsole.log('Error');
                    }
                });
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
                "sSwfPath": "{{ asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') }}"
            }
        });
    </script>

@endsection
