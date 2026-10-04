@extends('admin.master')

@section('title','Post Category')

@section('breadcrumb')
    <a href="{{ route('postcategory.index') }}" class="nbms-btn-secondary btn-sm">
        <i class="fa fa-list"></i> List
    </a>
@endsection

@section('content')

<form class="form-horizontal nbms-form"
      role="form"
      action="{{ route('postcategory.update', $data->id) }}"
      method="post"
      enctype="multipart/form-data">

    {{ csrf_field() }}

    <input type="hidden" name="_method" value="PUT">

    <div class="tray tray-center nbms-page">

        <div class="nbms-page-header">
            <div>
                <h2 class="nbms-page-title">
                    <i class="fa fa-folder-open"></i>
                    Edit Post Category
                </h2>

                <p class="nbms-page-subtitle">
                    Update the category information and settings
                </p>
            </div>
        </div>

        <div class="row">

            {{-- Main Content --}}
            <div class="col-md-8">

                <div class="panel nbms-panel">

                    <div class="panel-heading nbms-panel-heading">
                        <div>
                            <span class="panel-title">
                                <i class="fa fa-folder"></i>
                                Category Information
                            </span>

                            <small>
                                Update the category details below
                            </small>
                        </div>
                    </div>

                    <div class="panel-body nbms-form-body">

                        {{-- Post Type --}}
                        <div class="form-group nbms-form-group">

                            <label class="col-lg-3 control-label">
                                Post Type
                            </label>

                            <div class="col-lg-8">

                                <select class="form-control" name="post_type">

                                    @foreach($posttype as $row)

                                        <option
                                            value="{{ $row->id }}"
                                            {{ ($row->id == $data->post_type) ? 'selected' : '' }}
                                        >
                                            {{ $row->post_type }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>


                        {{-- Category --}}
                        <div class="form-group nbms-form-group">

                            <label class="col-lg-3 control-label">
                                Category
                            </label>

                            <div class="col-lg-8">

                                <input
                                    type="text"
                                    name="category"
                                    class="form-control"
                                    value="{{ $data->category }}"
                                    placeholder="Enter category name"
                                >

                            </div>

                        </div>


                        {{-- URI --}}
                        <div class="form-group nbms-form-group">

                            <label class="col-lg-3 control-label">
                                Uri
                            </label>

                            <div class="col-lg-8">

                                <input
                                    type="text"
                                    name="uri"
                                    class="form-control"
                                    value="{{ $data->uri }}"
                                    placeholder="category-uri"
                                >

                            </div>

                        </div>


                        {{-- Caption --}}
                        <div class="form-group nbms-form-group">

                            <label class="col-lg-3 control-label">
                                Caption
                            </label>

                            <div class="col-lg-8">

                                <input
                                    type="text"
                                    name="category_caption"
                                    class="form-control"
                                    value="{{ $data->category_caption }}"
                                    placeholder="Enter category caption"
                                >

                            </div>

                        </div>


                        {{-- Content --}}
                        <div class="form-group nbms-form-group">

                            <label class="col-lg-3 control-label">
                                Content
                            </label>

                            <div class="col-lg-8">

                                <textarea
                                    class="form-control"
                                    name="category_content"
                                    rows="5"
                                    autocomplete="off"
                                    placeholder="Enter category content"
                                >{{ $data->category_content }}</textarea>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Sidebar --}}
            <div class="col-md-4">

                {{-- Publish --}}
                <div class="nbms-side-card">

                    <div class="nbms-side-card-header">
                        <i class="fa fa-check-circle"></i>
                        Publish
                    </div>

                    <div class="nbms-side-card-body">

                        <div class="nbms-status-row">
                            <span>Status</span>
                            <strong>Active</strong>
                        </div>

                        <button
                            type="submit"
                            class="nbms-btn-submit nbms-btn-full"
                        >
                            <i class="fa fa-save"></i>
                            Update
                        </button>

                    </div>

                </div>


                {{-- Ordering --}}
                <div class="nbms-side-card">

                    <div class="nbms-side-card-header">
                        <i class="fa fa-sort-numeric-asc"></i>
                        Ordering
                    </div>

                    <div class="nbms-side-card-body">

                        <input
                            type="number"
                            name="ordering"
                            class="form-control"
                            value="{{ $data->ordering }}"
                            placeholder="Enter order"
                        >

                    </div>

                </div>


                {{-- Thumbnail --}}
                <div class="nbms-side-card">

                    <div class="nbms-side-card-header">
                        <i class="fa fa-image"></i>
                        Thumbnail
                    </div>

                    <div class="nbms-side-card-body">

                        @if($data->thumbnail)

                            <span class="id{{ $data->id }}">

                                <div class="nbms-current-thumbnail">

                                    <div class="nbms-thumbnail-header">

                                        <span>
                                            Current Thumbnail
                                        </span>

                                        <a
                                            href="#{{ $data->id }}"
                                            class="imagedelete nbms-btn-delete"
                                            title="Delete Thumbnail"
                                        >
                                            <i class="fa fa-trash"></i>
                                            Delete
                                        </a>

                                    </div>

                                    <div class="nbms-thumbnail-image">

                                        <img
                                            src="{{ asset('uploads/original/' . $data->thumbnail) }}"
                                            alt="{{ $data->category }}"
                                        >

                                    </div>

                                </div>

                            </span>

                            <hr class="nbms-divider">

                        @endif

                        <input
                            type="file"
                            name="thumbnail"
                            class="form-control nbms-file-input"
                        >

                    </div>

                </div>

            </div>

        </div>

    </div>

</form>

@endsection


@section('libraries')

<script type="text/javascript">

    // Delete Thumb
    $('.imagedelete').on('click', function(e) {

        e.preventDefault();

        if (!confirm('Are you sure to delete?')) {
            return false;
        }

        var csrf = $('meta[name="csrf-token"]').attr('content');
        var str = $(this).attr('href');
        var id = str.slice(1);

        $.ajax({

            type: 'DELETE',

            url: "{{ url('delete_category_thumb') . '/' }}" + id,

            data: {
                _token: csrf
            },

            success: function(data) {
                $('span.id' + id).remove();
            },

            error: function(data) {
                alert(data + 'Error!');
            }

        });

    });

</script>

@endsection
