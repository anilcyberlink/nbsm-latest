@extends('admin.master')

@section('title', 'Post Type')

@section('breadcrumb')
    <a href="{{ route('type.posttype.index', Request::segment(2)) }}" class="nbms-btn-secondary btn-sm">
        <i class="fa fa-list"></i> List
    </a>
@endsection

@section('content')

    <form class="form-horizontal nbms-form" role="form" action="{{ route('type.posttype.store', Request::segment(2)) }}"
        method="post" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="tray tray-center nbms-page">

            <div class="nbms-page-header">
                <div>
                    <h2 class="nbms-page-title">
                        <i class="fa fa-files-o"></i>
                        Create Post Type
                    </h2>

                    <p class="nbms-page-subtitle">
                        Create and configure a new website content type
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
                            Enter the details for this post type
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
                            <input type="text" id="post_type" name="post_type" class="form-control"
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
                                        <option value="{{ $key }}">
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
                            <input type="text" id="uri" name="uri" class="form-control"
                                placeholder="post-type-uri">
                        </div>
                    </div>


                    {{-- Sub Title --}}
                    <div class="form-group nbms-form-group">
                        <label class="col-lg-3 control-label">
                            Sub Title
                        </label>

                        <div class="col-lg-8">
                            <input type="text" id="uid" name="uid" class="form-control"
                                placeholder="Enter sub title">
                        </div>
                    </div>


                    {{-- Caption --}}
                    <div class="form-group nbms-form-group">
                        <label class="col-lg-3 control-label">
                            Caption
                        </label>

                        <div class="col-lg-8">
                            <textarea class="form-control" name="caption" rows="3" autocomplete="off" placeholder="Enter caption"></textarea>
                        </div>
                    </div>


                    {{-- Content --}}
                    <div class="form-group nbms-form-group">
                        <label class="col-lg-3 control-label">
                            Content
                        </label>

                        <div class="col-lg-8">
                            <textarea name="contents" class="my-editor form-control" rows="6" autocomplete="off"></textarea>
                        </div>
                    </div>


                    {{-- Ordering --}}
                    <div class="form-group nbms-form-group">
                        <label class="col-lg-3 control-label">
                            Ordering
                        </label>

                        <div class="col-lg-8">
                            <input type="text" id="ordering" name="ordering" class="form-control"
                                value="{{ $ordering }}">
                        </div>
                    </div>


                    {{-- Is Menu --}}
                    <div class="form-group nbms-form-group">
                        <label class="col-lg-3 control-label">
                            Is Menu?
                        </label>

                        <div class="col-lg-8">
                            <select name="is_menu" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group nbms-form-group">
                        <label class="col-lg-3 control-label">
                            Is Footer Menu?
                        </label>

                        <div class="col-lg-8">
                            <select name="is_footer_menu" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
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

                            <div class="nbms-help-text">
                                <i class="fa fa-image"></i>
                                Upload a banner image for this post type
                            </div>
                        </div>
                    </div>


                    {{-- Meta Keyword --}}
                    <div class="form-group nbms-form-group">
                        <label class="col-lg-3 control-label">
                            Meta Keyword
                        </label>

                        <div class="col-lg-8">
                            <input type="text" id="meta_keyword" name="meta_keyword" class="form-control"
                                placeholder="Enter meta keywords">
                        </div>
                    </div>


                    {{-- Meta Description --}}
                    <div class="form-group nbms-form-group">
                        <label class="col-lg-3 control-label">
                            Meta Description
                        </label>

                        <div class="col-lg-8">
                            <input type="text" id="meta_description" name="meta_description" class="form-control"
                                placeholder="Enter meta description">
                        </div>
                    </div>


                    {{-- Submit --}}
                    <div class="form-group nbms-form-group nbms-submit-group">
                        <label class="col-lg-3 control-label"></label>

                        <div class="col-lg-8">

                            <button type="submit" class="nbms-btn-submit">
                                <i class="fa fa-check"></i>
                                Submit
                            </button>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </form>

@endsection


@section('scripts')

    <script type="text/javascript">
        $(document).ready(function() {

            var post_type;

            $('#post_type').on('keyup', function() {

                post_type = $('#post_type').val();

                post_type = post_type.replace(/[^a-zA-Z0-9 ]+/g, "");

                post_type = post_type.replace(/\s+/g, "-");

                $('#uri').val(post_type);

            });

        });
    </script>

@endsection
