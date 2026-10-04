@extends('admin.master')

@section('title', 'Post Type')

@section('breadcrumb')
    <a href="{{ route('type.posttype.index', Request::segment(2)) }}" class="nbms-btn-secondary btn-sm">
        <i class="fa fa-list"></i> List
    </a>
@endsection

@section('content')

    <form class="form-horizontal nbms-form" role="form" action="{{ url('type/posttype', $data->id) }}" method="post"
        enctype="multipart/form-data">

        {{ csrf_field() }}

        <input type="hidden" name="_method" value="PUT">

        <div class="tray tray-center nbms-page">

            <div class="nbms-page-header">
                <div>
                    <h2 class="nbms-page-title">
                        <i class="fa fa-files-o"></i>
                        Edit Post Type
                    </h2>

                    <p class="nbms-page-subtitle">
                        Update the post type information and settings
                    </p>
                </div>
            </div>

            <div class="panel nbms-panel">

                <div class="panel-heading nbms-panel-heading">
                    <div>
                        <span class="panel-title">
                            <i class="fa fa-file-text-o"></i>
                            Post Type Information
                        </span>

                        <small>
                            Update the details for this post type
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
                            <input type="text" name="post_type" class="form-control" value="{{ $data->post_type }}"
                                placeholder="Enter post type">
                        </div>
                    </div>


                    {{-- Template --}}
                    <div class="form-group nbms-form-group">
                        <label class="col-lg-3 control-label">
                            Template
                        </label>

                        <div class="col-lg-8">

                            <select name="template" class="form-control">

                                {{-- @if ($templates) --}}

                                    @foreach ($templates as $key => $template)
                                        <option value="{{ $key }}"
                                            {{ $template == $data->template ? 'selected' : '' }}>
                                            {{ ucfirst($template) }}
                                        </option>
                                    @endforeach

                                {{-- @endif --}}

                            </select>

                        </div>
                    </div>


                    {{-- URI --}}
                    <div class="form-group nbms-form-group">
                        <label class="col-lg-3 control-label">
                            Uri
                        </label>

                        <div class="col-lg-8">

                            <input type="text" name="uri" class="form-control" value="{{ $data->uri }}" readonly>

                            <div class="nbms-help-text">
                                <i class="fa fa-lock"></i>
                                URI cannot be changed.
                            </div>

                        </div>
                    </div>


                    {{-- Sub Title --}}
                    <div class="form-group nbms-form-group">
                        <label class="col-lg-3 control-label">
                            Sub Title
                        </label>

                        <div class="col-lg-8">

                            <input type="text" name="uid" class="form-control" value="{{ $data->uid }}"
                                placeholder="Enter sub title">

                        </div>
                    </div>


                    {{-- Caption --}}
                    <div class="form-group nbms-form-group">
                        <label class="col-lg-3 control-label">
                            Caption
                        </label>

                        <div class="col-lg-8">

                            <textarea class="form-control" name="caption" rows="3" autocomplete="off">{{ $data->caption }}</textarea>

                        </div>
                    </div>


                    {{-- Content --}}
                    <div class="form-group nbms-form-group">
                        <label class="col-lg-3 control-label">
                            Content
                        </label>

                        <div class="col-lg-8">

                            <textarea name="contents" class="my-editor form-control" rows="6" autocomplete="off">{{ $data->content }}</textarea>

                        </div>
                    </div>


                    {{-- Ordering --}}
                    <div class="form-group nbms-form-group">
                        <label class="col-lg-3 control-label">
                            Ordering
                        </label>

                        <div class="col-lg-8">

                            <input type="text" id="ordering" name="ordering" class="form-control"
                                value="{{ $data->ordering }}">

                        </div>
                    </div>


                    {{-- Is Menu --}}
                    <div class="form-group nbms-form-group">
                        <label class="col-lg-3 control-label">
                            Is Menu?
                        </label>

                        <div class="col-lg-8">

                            <select name="is_menu" class="form-control">

                                <option value="0" {{ $data->is_menu == '0' ? 'selected' : '' }}>
                                    No
                                </option>

                                <option value="1" {{ $data->is_menu == '1' ? 'selected' : '' }}>
                                    Yes
                                </option>

                            </select>

                        </div>
                    </div>

                    {{-- Is Footer Menu --}}
                    <div class="form-group nbms-form-group">
                        <label class="col-lg-3 control-label">
                            Is Footer Menu?
                        </label>

                        <div class="col-lg-8">

                            <select name="is_footer_menu" class="form-control">

                                <option value="0" {{ $data->is_footer_menu == '0' ? 'selected' : '' }}>
                                    No
                                </option>

                                <option value="1" {{ $data->is_footer_menu == '1' ? 'selected' : '' }}>
                                    Yes
                                </option>

                            </select>

                        </div>
                    </div>


                    {{-- Banner --}}
                    <div class="form-group nbms-form-group">

                        <label class="col-lg-3 control-label">
                            Banner
                        </label>

                        <div class="col-lg-8">

                            <input type="file" name="banner" class="form-control nbms-file-input">

                            @if ($data->banner)
                                <div class="nbms-current-banner">

                                    <div class="nbms-current-banner-header">
                                        <span>
                                            <i class="fa fa-image"></i>
                                            Current Banner
                                        </span>
                                    </div>

                                    <div class="nbms-current-banner-image">

                                        <img src="{{ asset(env('PUBLIC_PATH') . 'uploads/medium/' . $data->banner) }}"
                                            alt="{{ $data->post_type }}">

                                    </div>

                                </div>
                            @endif

                        </div>

                    </div>


                    {{-- Meta Keyword --}}
                    <div class="form-group nbms-form-group">
                        <label class="col-lg-3 control-label">
                            Meta Keyword
                        </label>

                        <div class="col-lg-8">

                            <input type="text" id="meta_keyword" name="meta_keyword" class="form-control"
                                value="{{ $data->meta_keyword }}">

                        </div>
                    </div>


                    {{-- Meta Description --}}
                    <div class="form-group nbms-form-group">
                        <label class="col-lg-3 control-label">
                            Meta Description
                        </label>

                        <div class="col-lg-8">

                            <input type="text" id="meta_description" name="meta_description" class="form-control"
                                value="{{ $data->meta_description }}">

                        </div>
                    </div>


                    {{-- Submit --}}
                    <div class="form-group nbms-form-group nbms-submit-group">

                        <label class="col-lg-3 control-label"></label>

                        <div class="col-lg-8">

                            <button type="submit" class="nbms-btn-submit">
                                <i class="fa fa-save"></i>
                                Update Post Type
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </form>

@endsection
