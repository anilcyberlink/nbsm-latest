@extends('admin.master')

@section('title', 'Associated Post')

@section('breadcrumb')

    <a href="{{ url('admin/associated/' . Request::segment(3) . '/' . Request::segment(4)) }}" class="btn btn-default btn-sm">
        <i class="fa fa-list"></i> List
    </a>

@endsection

@section('content')

    <form class="form-horizontal" role="form"
        action="{{ url('admin/associated/' . Request::segment(3) . '/' . Request::segment(4) . '/store') }}" method="post"
        enctype="multipart/form-data">

        {{ csrf_field() }}

        <input type="hidden" name="post_id" value="{{ Request::segment(4) }}" />


        <div class="col-md-9">

            <div class="panel">

                <div class="panel-heading">
                    <span class="panel-title">
                        <i class="fa fa-link"></i>
                        Create Associated Post
                    </span>
                </div>

                <div class="panel-body">


                    {{-- Title --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            Title
                        </label>

                        <div class="col-lg-8">

                            <input type="text" id="title" name="title" class="form-control"
                                placeholder="Enter title">

                            <input type="hidden" id="uri" name="uri">

                        </div>

                    </div>


                    {{-- Sub Title --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            Sub Title
                        </label>

                        <div class="col-lg-8">

                            <input type="text" name="sub_title" class="form-control" placeholder="Enter sub title">

                        </div>

                    </div>


                    {{-- Brief --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            Brief
                        </label>

                        <div class="col-lg-8">

                            <textarea class="form-control my-editor" name="brief" rows="4" autocomplete="off"></textarea>

                        </div>

                    </div>


                    {{-- Contact --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            Contact
                        </label>

                        <div class="col-lg-8">

                            <input type="text" name="phone" class="form-control" placeholder="Contact number">

                        </div>

                    </div>


                    {{-- Email --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            Email
                        </label>

                        <div class="col-lg-8">

                            <input type="email" name="email" class="form-control" placeholder="Email address">

                        </div>

                    </div>


                    {{-- Facebook --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            Facebook Link
                        </label>

                        <div class="col-lg-8">

                            <input type="text" name="facebook_link" class="form-control"
                                placeholder="https://facebook.com/...">

                        </div>

                    </div>


                    {{-- Twitter --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            Twitter Link
                        </label>

                        <div class="col-lg-8">

                            <input type="text" name="twitter_link" class="form-control"
                                placeholder="https://twitter.com/...">

                        </div>

                    </div>


                    {{-- LinkedIn --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            LinkedIn Link
                        </label>

                        <div class="col-lg-8">

                            <input type="text" name="linked_in_link" class="form-control"
                                placeholder="https://linkedin.com/...">

                        </div>

                    </div>


                    {{-- Ordering --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            Ordering
                        </label>

                        <div class="col-lg-8">

                            <input type="number" name="ordering" class="form-control" value="{{ $ordering }}"
                                placeholder="Ordering">

                        </div>

                    </div>


                    {{-- Thumbnail --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            Thumbnail
                        </label>

                        <div class="col-lg-8">

                            <input type="file" name="thumbnail" class="form-control">

                            <small class="text-muted">
                                Upload an image for this associated post.
                            </small>

                        </div>

                    </div>


                    {{-- Submit --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label"></label>

                        <div class="col-lg-8">

                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i>
                                Create Associated Post
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

            $('#title').on('keyup', function() {

                var title = $('#title').val();

                title = title.replace(/[^a-zA-Z0-9 ]+/g, "");

                title = title.replace(/\s+/g, "-");

                $('#uri').val(title);

            });

        });
    </script>

@endsection
