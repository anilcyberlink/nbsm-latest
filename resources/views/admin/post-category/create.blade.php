@extends('admin.master')

@section('title', 'Post Category')

@section('breadcrumb')
    <a href="{{ route('postcategory.index') }}" class="nbms-btn-secondary btn-sm">
        <i class="fa fa-list"></i> List
    </a>
@endsection

@section('content')

    <form class="form-horizontal nbms-form" role="form" action="{{ route('postcategory.store') }}" method="post"
        enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="tray tray-center nbms-page">

            <div class="nbms-page-header">
                <div>
                    <h2 class="nbms-page-title">
                        <i class="fa fa-folder-open"></i>
                        Create Post Category
                    </h2>

                    <p class="nbms-page-subtitle">
                        Add a new category for your website content
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
                                    Enter the category details below
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
                                        @foreach ($data as $row)
                                            <option value="{{ $row->id }}">
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
                                    <input type="text" name="category" class="form-control"
                                        placeholder="Enter category name" required>
                                </div>

                            </div>

                            {{-- URI --}}
                            <div class="form-group nbms-form-group">

                                <label class="col-lg-3 control-label">
                                    Uri
                                </label>

                                <div class="col-lg-8">
                                    <input type="text" name="uri" class="form-control" placeholder="category-uri">
                                </div>

                            </div>

                            {{-- Caption --}}
                            <div class="form-group nbms-form-group">

                                <label class="col-lg-3 control-label">
                                    Caption
                                </label>

                                <div class="col-lg-8">
                                    <input type="text" name="category_caption" class="form-control"
                                        placeholder="Enter category caption">
                                </div>

                            </div>

                            {{-- Content --}}
                            <div class="form-group nbms-form-group">

                                <label class="col-lg-3 control-label">
                                    Content
                                </label>

                                <div class="col-lg-8">
                                    <textarea class="form-control" id="textArea3" name="category_content" rows="5" autocomplete="off"
                                        placeholder="Enter category content"></textarea>
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

                            <button type="submit" class="nbms-btn-submit nbms-btn-full">
                                <i class="fa fa-check"></i>
                                Publish
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

                            <input type="number" name="ordering" class="form-control" placeholder="Enter order">

                        </div>

                    </div>


                    {{-- Thumbnail --}}
                    <div class="nbms-side-card">

                        <div class="nbms-side-card-header">
                            <i class="fa fa-image"></i>
                            Thumbnail
                        </div>

                        <div class="nbms-side-card-body">

                            <input type="file" name="thumbnail" class="form-control nbms-file-input">

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </form>

@endsection
