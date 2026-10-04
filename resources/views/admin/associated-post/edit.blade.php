@extends('admin.master')

@section('title', 'Associated Post')

@section('breadcrumb')

    @if (Request::segment(3))
        <a href="{{ url('admin/associated/' . Request::segment(3) . '/' . $data->post_id) }}" class="btn btn-default btn-sm">
            <i class="fa fa-list"></i> List
        </a>
    @endif

@endsection

@section('content')

    <form class="form-horizontal" role="form"
        action="{{ url('admin/associated/' . Request::segment(3) . '/' . Request::segment(4)) }}" method="post"
        enctype="multipart/form-data">

        {{ csrf_field() }}

        <input type="hidden" name="_method" value="PUT">

        <input type="hidden" name="post_id" value="{{ Request::segment(4) }}">


        <div class="col-md-9">

            <div class="panel">

                <div class="panel-heading">
                    <span class="panel-title">
                        <i class="fa fa-link"></i>
                        Edit Associated Post
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
                                value="{{ $data->title }}">

                        </div>

                    </div>


                    {{-- Sub Title --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            Sub Title
                        </label>

                        <div class="col-lg-8">

                            <input type="text" name="sub_title" class="form-control" value="{{ $data->sub_title }}">

                        </div>

                    </div>


                    {{-- Brief --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            Brief
                        </label>

                        <div class="col-lg-8">

                            <textarea class="form-control my-editor" name="brief" rows="4" autocomplete="off">{{ $data->brief }}</textarea>

                        </div>

                    </div>


                    {{-- Contact --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            Contact
                        </label>

                        <div class="col-lg-8">

                            <input type="text" name="phone" class="form-control" value="{{ $data->phone }}">

                        </div>

                    </div>


                    {{-- Email --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            Email
                        </label>

                        <div class="col-lg-8">

                            <input type="email" name="email" class="form-control" value="{{ $data->email }}">

                        </div>

                    </div>


                    {{-- Facebook --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            Facebook Link
                        </label>

                        <div class="col-lg-8">

                            <input type="text" name="facebook_link" class="form-control"
                                value="{{ $data->facebook_link }}">

                        </div>

                    </div>


                    {{-- Twitter --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            Twitter Link
                        </label>

                        <div class="col-lg-8">

                            <input type="text" name="twitter_link" class="form-control"
                                value="{{ $data->twitter_link }}">

                        </div>

                    </div>


                    {{-- LinkedIn --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            LinkedIn Link
                        </label>

                        <div class="col-lg-8">

                            <input type="text" name="linked_in_link" class="form-control"
                                value="{{ $data->linked_in_link }}">

                        </div>

                    </div>


                    {{-- Ordering --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            Ordering
                        </label>

                        <div class="col-lg-8">

                            <input type="number" name="ordering" class="form-control" value="{{ $data->ordering }}">

                        </div>

                    </div>


                    <?php /*?> ?>

                    {{-- Icon --}}

                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            Icon
                        </label>

                        <div class="col-lg-8">

                            <select id="template" name="icon" class="form-control" style="font-family: 'FontAwesome';">

                                @if ($data->icon != null)
                                    <option value="{{ $data->icon }}" selected>
                                        {{ $data->icon }}
                                    </option>
                                @else
                                    <option value="" selected>
                                        Choose Icon
                                    </option>
                                @endif

                                <option value="coins">&#xf1c0; COINS</option>
                                <option value="chart-bar">&#xf080; BAR</option>
                                <option value="chart-line">&#xf201; LINE</option>
                                <option value="newspaper">&#xf1ea; NEWSPAPER</option>
                                <option value="user-plus">&#xf007; USER PLUS</option>
                                <option value="briefcase">&#xf0b1; BRIEFCASE</option>
                                <option value="lightbulb">&#xf0eb; LIGHTBULB</option>
                                <option value="glasses">&#xf000; GLASSES</option>
                                <option value="clock">&#xf017; CLOCK</option>
                                <option value="bullseye">&#xf140; BULLSEYE</option>
                                <option value="wallet">&#xf07b; WALLET</option>
                                <option value="star">&#xf005; STAR</option>
                                <option value="handshake">HANDSHAKE</option>
                                <option value="fingerprint">FINGERPRINT</option>

                            </select>

                        </div>

                    </div>

                    <?php */?>


                    {{-- Thumbnail --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label">
                            Thumbnail
                        </label>

                        <div class="col-lg-8">

                            <div class="associated-thumbnail">

                                @if ($data->thumbnail)
                                    <div class="associated-thumbnail-preview">

                                        <img src="{{ asset(env('PUBLIC_PATH') . 'uploads/medium/' . $data->thumbnail) }}"
                                            width="180" alt="{{ $data->title }}">

                                        {{-- <a href="#{{ $data->id }}" class="imagedelete" title="Remove thumbnail">
                                            <i class="fa fa-times"></i>
                                        </a> --}}

                                    </div>

                                    <hr>
                                @endif

                                <input type="file" name="thumbnail" class="form-control">

                            </div>

                        </div>

                    </div>


                    {{-- Submit --}}
                    <div class="form-group">

                        <label class="col-lg-3 control-label"></label>

                        <div class="col-lg-8">

                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i>
                                Update Associated Post
                            </button>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </form>
@endsection
