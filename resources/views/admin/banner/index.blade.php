@extends('admin.master')

@section('title', 'Banner')

@section('breadcrumb')
    <?php /*?> ?>
    <a href="{{ url('admin/banner/create') }}" class="btn nbms-btn-primary btn-sm">
        <i class="fa fa-plus"></i> Create Banner
    </a>
    <?php */?>
@endsection

@section('content')

    <div class="tray tray-center nbms-page">

        {{-- Page Header --}}
        <div class="nbms-page-header">
            <div>
                <h2 class="nbms-page-title">
                    <i class="fa fa-picture-o"></i>
                    Manage Banners
                </h2>
                <p class="nbms-page-subtitle">
                    Manage website banners and promotional images
                </p>
            </div>

            <?php /*?> ?>
            <div>
                <a href="{{ url('admin/banner/create') }}" class="btn nbms-btn-primary">
                    <i class="fa fa-plus"></i>
                    Create Banner
                </a>
            </div>
            <?php */?>
        </div>


        {{-- Banner Table --}}
        <div class="panel nbms-panel">

            <div class="panel-body nbms-panel-body">

                <div class="table-responsive">

                    <table class="table admin-form theme-warning fs13 nbms-table">

                        <thead>
                            <tr>
                                <th width="70">SN</th>
                                <th>Title</th>
                                <th width="220">Banner</th>
                                <th width="150" class="text-center">Action</th>
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
                                                {{ ucfirst($row->title) }}
                                            </div>
                                        </td>

                                        <td>

                                            @if ($row->picture)
                                                <div class="nbms-banner-image">
                                                    <img src="{{ asset('uploads/banners/' . $row->picture) }}"
                                                        alt="{{ $row->title }}">
                                                </div>
                                            @else
                                                <span class="nbms-no-image">
                                                    <i class="fa fa-image"></i>
                                                    No Image
                                                </span>
                                            @endif

                                        </td>

                                        <td class="text-center">

                                            <div class="nbms-action-buttons">

                                                <a href="{{ url('admin/banner/' . $row->id . '/edit') }}"
                                                    class="nbms-btn-edit" title="Edit Banner">
                                                    <i class="fa fa-pencil"></i>
                                                    Edit
                                                </a>

                                                <?php /*
                                                <a
                                                    href="#{{ $row->id }}"
                                                    class="nbms-btn-delete btn-delete"
                                                    title="Delete Banner"
                                                >
                                                    <i class="fa fa-trash"></i>
                                                    Delete
                                                </a>
                                                */
                                                ?>

                                            </div>

                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center nbms-empty-state">
                                        <i class="fa fa-picture-o"></i>
                                        <div>No banners found.</div>
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

                if (!confirm('Are you sure to delete?')) return false;

                var csrf = $('meta[name="csrf-token"]').attr('content');
                var str = $(this).attr('href');
                var id = str.slice(1);

                $.ajax({

                    type: 'DELETE',

                    url: "{{ url('admin/banner') . '/' }}" + id,

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
