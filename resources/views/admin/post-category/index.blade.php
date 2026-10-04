@extends('admin.master')

@section('title', 'Post Category')

@section('breadcrumb')
    <a href="{{ route('postcategory.create') }}" class="nbms-btn-primary btn-sm">
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
                    <i class="fa fa-folder-open"></i>
                    Manage Post Categories
                </h2>

                <p class="nbms-page-subtitle">
                    Manage categories used to organize website posts
                </p>

            </div>

        </div>


        {{-- Category Table --}}
        <div class="panel nbms-panel">

            <div class="panel-body nbms-panel-body">

                <div class="table-responsive">

                    <table class="table admin-form theme-warning fs13 nbms-table">

                        <thead>
                            <tr>

                                <th width="80">
                                    SN
                                </th>

                                <th>
                                    Post Category
                                </th>

                                <th width="180" class="text-center">
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
                                                {{ ucfirst($row->category) }}
                                            </div>
                                        </td>

                                        <td class="text-center">

                                            <div class="nbms-action-buttons">

                                                <a href="{{ route('postcategory.edit', $row->id) }}" class="nbms-btn-edit"
                                                    title="Edit Category">
                                                    <i class="fa fa-pencil"></i>
                                                    Edit
                                                </a>


                                                @if (!is_empty_category($row->id))
                                                    <a href="#{{ $row->id }}" class="nbms-btn-delete btn-delete"
                                                        title="Delete Category">
                                                        <i class="fa fa-trash"></i>
                                                        Delete
                                                    </a>
                                                @endif

                                            </div>

                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>

                                    <td colspan="3" class="text-center nbms-empty-state">

                                        <i class="fa fa-folder-open"></i>

                                        <div>
                                            No post categories found.
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

                    url: "{{ url('admin/postcategory') . '/' }}" + id,

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
