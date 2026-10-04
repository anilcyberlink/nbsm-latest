@extends('admin.master')

@section('title', 'Post Type')

@section('breadcrumb')

    <a href="{{ route('type.posttype.create', Request::segment(2)) }}" class="nbms-btn-primary btn-sm">
        <i class="fa fa-plus"></i>
        Create
    </a>

@endsection

@section('content')

    <div class="tray tray-center nbms-page">
        {{-- Page Header --}}
        <div class="nbms-page-header">
            <div>
                <h2 class="nbms-page-title">
                    <i class="fa fa-files-o"></i>
                    Manage Post Types
                </h2>
                <p class="nbms-page-subtitle">
                    Manage and organize your website content types
                </p>
            </div>
        </div>

        {{-- Post Type Table --}}
        <div class="panel nbms-panel">
            <div class="panel-body nbms-panel-body">
                <div class="table-responsive">
                    <table class="table admin-form theme-warning fs13 nbms-table">
                        <thead>
                            <tr>
                                <th width="70">
                                    SN
                                </th>
                                <th>
                                    Post Type
                                </th>
                                <th width="120">
                                    Is Menu
                                </th>
                                <th width="120">
                                    Is Footer
                                </th>
                                <th width="120">
                                    Ordering
                                </th>
                                <th width="190">
                                    Date
                                </th>
                                <th width="150" class="text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data) > 0)
                                @foreach ($data as $row)
                                    <tr class="id{{ $row->id }}">
                                        <td class="nbms-sn">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            <div class="nbms-banner-title">
                                                <a href="{{ url('admin/'.$row->uri)}}">{{ ucfirst($row->post_type) }}</a>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($row->is_menu == 1)
                                                <span class="nbms-status nbms-status-yes">
                                                    <i class="fa fa-check"></i>
                                                    Yes
                                                </span>
                                            @else
                                                <span class="nbms-status nbms-status-no">
                                                    <i class="fa fa-minus"></i>
                                                    No
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->is_footer_menu == 1)
                                                <span class="nbms-status nbms-status-yes">
                                                    <i class="fa fa-check"></i>
                                                    Yes
                                                </span>
                                            @else
                                                <span class="nbms-status nbms-status-no">
                                                    <i class="fa fa-minus"></i>
                                                    No
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $row->ordering }}
                                        </td>
                                        <td class="nbms-date">
                                            {{ $row->created_at }}
                                        </td>
                                        <td class="text-center">
                                            <div class="nbms-action-buttons">
                                                <a href="{{ url('type/posttype/' . $row->id . '/edit') }}"
                                                    class="nbms-btn-edit" title="Edit Post Type">
                                                    <i class="fa fa-pencil"></i>
                                                    Edit
                                                </a>

                                                @if (!is_empty_posttype($row->id))
                                                    {{--
                                                    <a
                                                        href="#{{$row->id}}"
                                                        class="nbms-btn-delete btn-delete"
                                                        title="Delete Post Type"
                                                    >
                                                        <i class="fa fa-trash"></i>
                                                        Delete
                                                    </a>
                                                    --}}
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center nbms-empty-state">
                                        <i class="fa fa-files-o"></i>
                                        <div>
                                            No post types found.
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript">
        jQuery(document).ready(function() {

            $('.btn-delete').on('click', function(e) {

                e.preventDefault();

                if (!confirm('Are you sure to delete?')) {
                    return false;
                }

                var csrf = $('meta[name="csrf-token"]').attr('content');
                var str = $(this).attr('href');
                var id = str.slice(1);

                $.ajax({

                    type: 'DELETE',

                    url: "{{ url('type/posttype') . '/' }}" + id,

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

            });

        });
    </script>

@endsection
