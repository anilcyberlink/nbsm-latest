@extends('admin.master')

@section('title', 'Banner')

@section('breadcrumb')
    <a href="{{ url('admin/banner') }}" class="nbms-btn-secondary btn-sm">
        <i class="fa fa-list"></i> List
    </a>
@endsection

@section('content')

    <div class="tray tray-center nbms-page">

        {{-- Page Header --}}
        <div class="nbms-page-header">
            <div>
                <h2 class="nbms-page-title">
                    <i class="fa fa-picture-o"></i>
                    Edit Banner
                </h2>

                <p class="nbms-page-subtitle">
                    Update the banner information and settings
                </p>
            </div>
        </div>


        <form
            class="form-horizontal nbms-form"
            role="form"
            action="{{ url('admin/banner', $data->id) }}"
            method="post"
            enctype="multipart/form-data"
        >

            {{ csrf_field() }}

            <input type="hidden" name="_method" value="PUT" />

            <div class="panel nbms-panel">

                {{-- Panel Header --}}
                <div class="panel-heading nbms-panel-heading">
                    <div>
                        <span class="panel-title">
                            <i class="fa fa-image"></i>
                            Banner Information
                        </span>

                        <small>
                            Update the banner details below
                        </small>
                    </div>
                </div>


                <div class="panel-body nbms-form-body">

                    {{-- Title --}}
                    <div class="form-group nbms-form-group">

                        <label for="banner-title" class="col-lg-3 control-label">
                            Title
                        </label>

                        <div class="col-lg-6">

                            <input
                                type="text"
                                id="banner-title"
                                name="title"
                                class="form-control"
                                value="{{ $data->title }}"
                                placeholder="Enter banner title"
                            >

                        </div>

                    </div>


                    {{-- Caption 1 --}}
                    <div class="form-group nbms-form-group">

                        <label for="banner-caption" class="col-lg-3 control-label">
                            Caption1
                        </label>

                        <div class="col-lg-6">

                            <input
                                type="text"
                                id="banner-caption"
                                name="caption"
                                class="form-control"
                                value="{{ $data->caption }}"
                                placeholder="Enter caption"
                            >

                        </div>

                    </div>


                    {{-- YouTube Video --}}
                    <div class="form-group nbms-form-group">

                        <label
                            class="col-lg-3 control-label"
                            for="banner-video"
                        >
                            Youtube Video Link
                        </label>

                        <div class="col-lg-6">

                            <input
                                type="text"
                                id="banner-video"
                                class="form-control"
                                name="video"
                                value="{{ $data->video }}"
                                placeholder="YouTube video link"
                            >

                        </div>

                    </div>


                    {{-- Content --}}
                    <div class="form-group nbms-form-group">

                        <label
                            class="col-lg-3 control-label"
                            for="textArea2"
                        >
                            Content
                        </label>

                        <div class="col-lg-6">

                            <textarea
                                class="form-control my-editor"
                                id="textArea2"
                                name="content"
                                rows="3"
                            >{{ $data->content }}</textarea>

                        </div>

                    </div>


                    {{-- Picture --}}
                    <div class="form-group nbms-form-group">

                        <label
                            class="col-lg-3 control-label"
                            for="banner"
                        >
                            Picture
                        </label>

                        <div class="col-lg-6">

                            <input
                                type="file"
                                id="banner"
                                class="form-control nbms-file-input"
                                name="picture"
                            >

                            <div class="nbms-help-text">
                                <i class="fa fa-info-circle"></i>
                                Recommended size:
                                <strong>1900px × 560px</strong>
                            </div>

                        </div>

                    </div>


                    {{-- Existing Picture --}}
                    @if($data->picture != '' OR $data->picture != null)

                        <span class="bannerid{{ $data->id }}">

                            <div class="form-group nbms-form-group">

                                <label class="col-lg-3 control-label">
                                    Current Picture
                                </label>

                                <div class="col-lg-6">

                                    <div class="nbms-current-banner">

                                        <div class="nbms-current-banner-header">

                                            <span>
                                                <i class="fa fa-image"></i>
                                                Current Banner
                                            </span>

                                            <a
                                                href="#{{ $data->id }}"
                                                class="banner_delete nbms-btn-delete"
                                                title="Delete Banner"
                                            >
                                                <i class="fa fa-trash"></i>
                                                Delete
                                            </a>

                                        </div>

                                        <div class="nbms-current-banner-image">

                                            <img
                                                src="{{ url(env('PUBLIC_PATH').'uploads/banners/' . $data->picture) }}"
                                                alt="{{ $data->title }}"
                                            >

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </span>

                    @endif


                    {{-- Link Title --}}
                    <div class="form-group nbms-form-group">

                        <label
                            class="col-lg-3 control-label"
                            for="link-title"
                        >
                            Link Title
                        </label>

                        <div class="col-lg-6">

                            <input
                                type="text"
                                id="link-title"
                                class="form-control"
                                name="link_title"
                                value="{{ $data->link_title }}"
                                placeholder="Link Title"
                            >

                        </div>

                    </div>


                    {{-- Banner Link --}}
                    <div class="form-group nbms-form-group">

                        <label
                            class="col-lg-3 control-label"
                            for="banner-link"
                        >
                            Banner Link
                        </label>

                        <div class="col-lg-6">

                            <input
                                type="text"
                                id="banner-link"
                                class="form-control"
                                name="link"
                                value="{{ $data->link }}"
                                placeholder="https://www.google.com"
                            >

                            <div class="nbms-help-text">
                                <i class="fa fa-link"></i>
                                Example:
                                <strong>https://www.google.com</strong>
                            </div>

                        </div>

                    </div>


                    {{-- Submit --}}
                    <div class="form-group nbms-form-group nbms-submit-group">

                        <label class="col-lg-3 control-label"></label>

                        <div class="col-lg-6">

                            <button
                                type="submit"
                                class="nbms-btn-submit"
                                name="submit"
                            >
                                <i class="fa fa-save"></i>
                                Update Banner
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>

@endsection


@section('libraries')

    <script type="text/javascript">

        $('.banner_delete').on('click', function(e) {

            e.preventDefault();

            if (!confirm('Are you sure to delete?')) {
                return false;
            }

            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);

            $.ajax({

                type: 'delete',

                url: "{{ url('banner_delete') . '/' }}" + id,

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

    </script>

@endsection
