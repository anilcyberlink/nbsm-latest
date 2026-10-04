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
                    Create Banner
                </h2>

                <p class="nbms-page-subtitle">
                    Add a new banner or popup to your website
                </p>
            </div>
        </div>


        <form
            class="form-horizontal nbms-form"
            role="form"
            action="{{ url('admin/banner') }}"
            method="post"
            enctype="multipart/form-data"
        >

            {{ csrf_field() }}

            <div class="panel nbms-panel">

                <div class="panel-heading nbms-panel-heading">
                    <div>
                        <span class="panel-title">
                            <i class="fa fa-image"></i>
                            Banner Information
                        </span>

                        <small>
                            Enter the banner details below
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
                                placeholder="Enter banner title"
                                required
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
                                placeholder="Enter caption"
                            >
                        </div>

                    </div>


                    {{-- Caption 2 --}}
                    <div class="form-group nbms-form-group">

                        <label class="col-lg-3 control-label" for="banner-video">
                            Caption2
                        </label>

                        <div class="col-lg-6">

                            <input
                                type="text"
                                id="banner-video"
                                class="form-control"
                                name="video"
                                placeholder="Enter second caption"
                            >

                        </div>

                    </div>


                    {{-- Content --}}
                    <div class="form-group nbms-form-group">

                        <label class="col-lg-3 control-label" for="textArea2">
                            Content
                        </label>

                        <div class="col-lg-6">

                            <textarea
                                class="form-control my-editor"
                                id="textArea2"
                                name="content"
                                rows="3"
                            ></textarea>

                        </div>

                    </div>


                    {{-- Picture --}}
                    <div class="form-group nbms-form-group">

                        <label class="col-lg-3 control-label" for="banner">
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
                                Recommended size: <strong>1500px × 500px</strong>
                            </div>

                        </div>

                    </div>


                    {{-- Link Title --}}
                    <div class="form-group nbms-form-group">

                        <label class="col-lg-3 control-label" for="link-title">
                            Link Title
                        </label>

                        <div class="col-lg-6">

                            <input
                                type="text"
                                id="link-title"
                                class="form-control"
                                name="link_title"
                                placeholder="Enter link title"
                            >

                        </div>

                    </div>


                    {{-- Video Link --}}
                    <div class="form-group nbms-form-group">

                        <label class="col-lg-3 control-label" for="banner-link">
                            VideoLink
                        </label>

                        <div class="col-lg-6">

                            <input
                                type="text"
                                id="banner-link"
                                class="form-control"
                                name="link"
                                placeholder="https://www.google.com"
                            >

                            <div class="nbms-help-text">
                                <i class="fa fa-link"></i>
                                Example: <strong>https://www.google.com</strong>
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
                                <i class="fa fa-check"></i>
                                Submit
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>

@endsection
