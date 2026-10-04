@extends('admin.master')

@section('title', 'Our Trades')

@section('breadcrumb')
    <a href="{{ route('our-trades.index') }}" class="nbms-btn-secondary btn-sm">
        <i class="fa fa-list"></i> List
    </a>
@endsection

@section('content')

    <form class="form-horizontal trades-form" role="form" action="{{ route('our-trades.update', $data->id) }}" method="post"
        enctype="multipart/form-data">

        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT" />

        <div class="trades-page">

            <div class="trades-header">
                <div>
                    <h2>
                        <i class="fa fa-briefcase"></i>
                        Edit Trade
                    </h2>
                    <p>
                        Update trade information and media
                    </p>
                </div>
            </div>


            <div class="row">

                {{-- Main Content --}}
                <div class="col-md-9">

                    <div class="panel trades-form-panel">

                        <div class="panel-heading trades-form-heading">
                            <span class="panel-title">
                                <i class="fa fa-pencil"></i>
                                Trade Information
                            </span>
                        </div>

                        <div class="panel-body">


                            {{-- Title --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Title
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" id="title" name="title" class="form-control"
                                        value="{{ $data->title }}" />

                                    <input type="hidden" id="uri" name="uri" value="{{ $data->uri }}" />

                                </div>

                            </div>


                            {{-- Sub Title --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Sub Title
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" name="sub_title" class="form-control"
                                        value="{{ $data->sub_title }}" />

                                </div>

                            </div>


                            {{-- Category --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Category
                                </label>

                                <div class="col-lg-9">

                                    <select name="category_id" class="form-control">

                                        <option value="0">
                                            Select Category
                                        </option>

                                        @if ($category)

                                            @foreach ($category as $row)
                                                <option value="{{ $row->id }}"
                                                    {{ $row->id == $data->category_id ? 'selected' : '' }}>
                                                    {{ $row->category }}
                                                </option>
                                            @endforeach

                                        @endif

                                    </select>

                                </div>

                            </div>


                            {{-- Brief --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Brief
                                </label>

                                <div class="col-lg-9">

                                    <textarea class="form-control" name="brief" rows="3">{{ $data->brief }}</textarea>

                                </div>

                            </div>


                            {{-- UID --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    UID
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" name="content" class="form-control"
                                        value="{{ $data->content }}" />

                                </div>

                            </div>


                            {{-- Duration --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Duration of course
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" name="client_name" class="form-control"
                                        value="{{ $data->client_name }}" />

                                </div>

                            </div>


                            {{-- Training Hours --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Total training hours
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" name="country" class="form-control"
                                        value="{{ $data->country }}" />

                                </div>

                            </div>


                            {{-- Qualification --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Minimum qualification of the participant
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" name="service" class="form-control"
                                        value="{{ $data->service }}" />

                                </div>

                            </div>


                            {{-- Target Group --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Target group
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" name="year" class="form-control"
                                        value="{{ $data->year }}" />

                                </div>

                            </div>


                            {{-- Medium --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Medium of instruction
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" name="meta_keyword" class="form-control"
                                        value="{{ $data->meta_keyword }}" />

                                </div>

                            </div>


                            {{-- Method --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Method
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" name="meta_description" class="form-control"
                                        value="{{ $data->meta_description }}" />

                                </div>

                            </div>


                            {{-- Group Structure --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Group structure
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" name="external_link" class="form-control"
                                        value="{{ $data->external_link }}" />

                                </div>

                            </div>


                        </div>

                    </div>

                </div>


                {{-- Sidebar --}}
                <div class="col-md-3">

                    <div class="admin-form trades-sidebar">


                        {{-- Status --}}
                        <div class="sid_ mb10 trades-card">

                            <div class="trades-card-header">

                                <span>
                                    <i class="fa fa-check-circle"></i>
                                    Status
                                </span>

                                <strong>
                                    Active
                                </strong>

                            </div>

                            <div class="trades-card-body">

                                <input type="submit" class="btn btn-primary btn-sm trades-publish-btn" value="Update" />

                            </div>

                        </div>


                        {{-- Ordering --}}
                        <div class="sid_ mb10 trades-card">

                            <div class="trades-card-header">
                                <i class="fa fa-sort-numeric-asc"></i>
                                Ordering
                            </div>

                            <div class="trades-card-body">

                                <input type="number" name="ordering" class="form-control" placeholder="Ordering"
                                    value="{{ $data->ordering }}" />

                            </div>

                        </div>


                        {{-- Icon --}}
                        <div class="sid_ mb10 trades-card">

                            <div class="trades-card-header">
                                <i class="fa fa-star"></i>
                                Icon
                            </div>

                            <div class="trades-card-body">

                                @if ($data->icon)
                                    <span class="iconid{{ $data->id }} trades-image-preview">

                                        <a href="#{{ $data->id }}" class="delete_icon trades-image-delete">
                                            <i class="fa fa-times"></i>
                                        </a>

                                        <img src="{{ asset(env('PUBLIC_PATH') . 'uploads/medium/' . $data->icon) }}"
                                            width="150" alt="Icon" />

                                    </span>

                                    <hr>
                                @endif

                                <input type="file" name="icon" />

                            </div>

                        </div>


                        {{-- Thumbnail --}}
                        <div class="sid_ mb10 trades-card">

                            <div class="trades-card-header">
                                <i class="fa fa-picture-o"></i>
                                Thumbnail
                            </div>

                            <div class="trades-card-body">

                                @if ($data->thumbnail)
                                    <span class="thumbnailid{{ $data->id }} trades-image-preview">

                                        <a href="#{{ $data->id }}" class="delete_thumbnail trades-image-delete">
                                            <i class="fa fa-times"></i>
                                        </a>

                                        <img src="{{ asset(env('PUBLIC_PATH') . 'uploads/medium/' . $data->thumbnail) }}"
                                            width="150" alt="Thumbnail" />

                                    </span>

                                    <hr>
                                @endif

                                <input type="file" name="thumbnail" />

                            </div>

                        </div>


                        {{-- Page Thumbnail --}}
                        <div class="sid_ mb10 trades-card">

                            <div class="trades-card-header">
                                <i class="fa fa-image"></i>
                                Page Thumbnail
                            </div>

                            <div class="trades-card-body">

                                @if ($data->page_thumbnail)
                                    <span class="page_thumbnailid{{ $data->id }} trades-image-preview">

                                        <a href="#{{ $data->id }}" class="delete_pagethumbnail trades-image-delete">
                                            <i class="fa fa-times"></i>
                                        </a>

                                        <img src="{{ asset(env('PUBLIC_PATH') . 'uploads/medium/' . $data->page_thumbnail) }}"
                                            width="150" alt="Page Thumbnail" />

                                    </span>

                                    <hr>
                                @endif

                                <input type="file" name="page_thumbnail" />

                            </div>

                        </div>


                        {{-- Banner --}}
                        <div class="sid_ mb10 trades-card">

                            <div class="trades-card-header">
                                <i class="fa fa-picture-o"></i>
                                Banner
                            </div>

                            <div class="trades-card-body">

                                @if ($data->banner)
                                    <span class="bannerid{{ $data->id }} trades-image-preview">

                                        <a href="#{{ $data->id }}" class="delete_banner trades-image-delete">
                                            <i class="fa fa-times"></i>
                                        </a>

                                        <img src="{{ asset(env('PUBLIC_PATH') . 'uploads/medium/' . $data->banner) }}"
                                            width="150" alt="Banner" />

                                    </span>

                                    <hr>
                                @endif

                                <input type="file" name="banner" />

                            </div>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </form>

@endsection


@section('libraries')

    <script type="text/javascript">
        $('.delete_icon').on('click', function(e) {

            e.preventDefault();

            if (!confirm('Are you sure to delete?')) return false;

            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);

            $.ajax({

                type: 'delete',

                url: "{{ url('delete_picon') . '/' }}" + id,

                data: {
                    _token: csrf
                },

                success: function(data) {
                    $('span.iconid' + id).remove();
                },

                error: function(data) {
                    alert(data + 'Error!');
                }

            });

        });


        $('.delete_thumbnail').on('click', function(e) {

            e.preventDefault();

            if (!confirm('Are you sure to delete?')) return false;

            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);

            $.ajax({

                type: 'delete',

                url: "{{ url('delete_pthumbnail') . '/' }}" + id,

                data: {
                    _token: csrf
                },

                success: function(data) {
                    $('span.thumbnailid' + id).remove();
                },

                error: function(data) {
                    alert(data + 'Error!');
                }

            });

        });


        $('.delete_pagethumbnail').on('click', function(e) {

            e.preventDefault();

            if (!confirm('Are you sure to delete?')) return false;

            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);

            $.ajax({

                type: 'delete',

                url: "{{ url('delete_portfolio_thumb') . '/' }}" + id,

                data: {
                    _token: csrf
                },

                success: function(data) {
                    $('span.page_thumbnailid' + id).remove();
                },

                error: function(data) {
                    alert(data + 'Error!');
                }

            });

        });


        $('.delete_banner').on('click', function(e) {

            e.preventDefault();

            if (!confirm('Are you sure to delete?')) return false;

            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);

            $.ajax({

                type: 'delete',

                url: "{{ url('delete_pbanner') . '/' }}" + id,

                data: {
                    _token: csrf
                },

                success: function(data) {
                    $('span.bannerid' + id).remove();
                },

                error: function(data) {
                    alert(data + 'Error!');
                }

            });

        });


        $(document).ready(function() {

            $('#title').on('keyup', function() {

                var title = $('#title').val();

                title = title.replace(/[^a-zA-Z0-9 ]+/g, "");

                title = title.replace(/\s+/g, "-");

                $('#uri').val(title);

            });

        });
    </script>

@endsection
