@extends('admin.master')

@section('title', Request::segment(2))

@section('breadcrumb')

    @if($data->post_parent == 0)
        <a href="{{ route('admin.post.index', Request::segment(2)) }}"
           class="nbms-btn-secondary btn-sm">
            <i class="fa fa-list"></i>
            List
        </a>
    @else
        <a href="{{ route('admin.post.index', Request::segment(2)) }}/{{$data->post_parent}}"
           class="nbms-btn-secondary btn-sm">
            <i class="fa fa-arrow-left"></i>
            List
        </a>
    @endif

    <a href="{{ route('admin.post.index', Request::segment(2)) }}/create"
       class="nbms-btn-primary btn-sm">
        <i class="fa fa-plus"></i>
        Create
    </a>

@endsection

@section('content')

<form class="form-horizontal nbms-post-form"
      role="form"
      action="{{ url('admin/'.Request::segment(2).'/'.$data->id) }}"
      method="post"
      enctype="multipart/form-data">

    {{ csrf_field() }}

    <input type="hidden" name="_method" value="PUT" />
    <input type="hidden" name="post_type" value="{{ Request::segment(2) }}" />
    <input type="hidden" name="post_date" value="<?=date('Y-m-d h:i:s')?>" />

    <div class="nbms-post-page">

        {{-- Page Header --}}
        <div class="nbms-post-header">

            <div>

                <h2 class="nbms-post-title">
                    <i class="fa fa-files-o"></i>
                    Edit {{ posttype(Request::segment(2))->post_type }}
                </h2>

                <p class="nbms-post-subtitle">
                    Update the content and settings for this post
                </p>

            </div>

        </div>


        <div class="row">

            {{-- Main Content --}}
            <div class="col-md-9">

                <div class="panel nbms-post-panel">

                    <div class="panel-heading nbms-post-panel-heading">

                        <span class="panel-title">
                            <i class="fa fa-pencil"></i>
                            Edit Post
                        </span>

                    </div>

                    <div class="panel-body">


                        {{-- Title --}}
                        <div class="form-group">

                            <label class="col-lg-2 control-label">
                                Title
                            </label>

                            <div class="col-lg-9">

                                <div class="bs-component">

                                    <input
                                        type="text"
                                        id="post_title"
                                        name="post_title"
                                        class="form-control"
                                        value="{{$data->post_title}}"
                                    />

                                    <input
                                        type="hidden"
                                        id="uri"
                                        name="uri"
                                        value="{{$data->uri}}"
                                    />

                                </div>

                            </div>

                        </div>


                        {{-- Sub Title --}}
                        <div class="form-group">

                            <label class="col-lg-2 control-label">
                                Sub Title
                            </label>

                            <div class="col-lg-9">

                                <div class="bs-component">

                                    <input
                                        type="text"
                                        name="sub_title"
                                        class="form-control"
                                        value="{{$data->sub_title}}"
                                    />

                                </div>

                            </div>

                        </div>


                        <?php /*?>

                        <div class="form-group">

                            <label class="col-lg-2 control-label">
                                UID
                            </label>

                            <div class="col-lg-9">

                                <div class="bs-component">

                                    <input
                                        type="text"
                                        name="uid"
                                        class="form-control"
                                        value="{{$data->uid}}"
                                    />

                                </div>

                            </div>

                        </div>


                        <div class="form-group">

                            <label class="col-lg-2 control-label">
                                Associated Title
                            </label>

                            <div class="col-lg-9">

                                <div class="bs-component">

                                    <input
                                        type="text"
                                        class="form-control"
                                        name="associated_title"
                                        value="{{$data->associated_title}}"
                                    />

                                </div>

                            </div>

                        </div>

                        <?php */?>


                        {{-- Category --}}
                        <div class="form-group">

                            <label class="col-lg-2 control-label">
                                Category
                            </label>

                            <div class="col-lg-9">

                                <div class="bs-component">

                                    <select name="category" class="form-control">

                                        <option value="0">
                                            Select Category
                                        </option>

                                        @if($category)

                                            @foreach($category as $row)

                                                <option
                                                    value="{{$row->id}}"
                                                    {{ ($row->id == $data->post_category) ? 'selected' : '' }}
                                                >
                                                    {{$row->category}}
                                                </option>

                                            @endforeach

                                        @endif

                                    </select>

                                    <div
                                        id="source-button"
                                        class="btn btn-primary btn-xs"
                                        style="display: none;"
                                    >
                                        &lt; &gt;
                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- Parent --}}
                        @if($parent_post->count() > 0)

                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Select Parent
                                </label>

                                <div class="col-lg-9">

                                    <div class="bs-component">

                                        <select name="post_parent" class="form-control">

                                            <option value="0">
                                                Choose Parent
                                            </option>

                                            @foreach($parent_post as $row)

                                                @if($row->id == $data->id)
                                                    @continue
                                                @endif

                                                <option
                                                    value="{{$row->id}}"
                                                    {{ ($row->id == $data->post_parent) ? 'selected' : '' }}
                                                >
                                                    {{$row->post_title}}
                                                </option>

                                                @if(has_child_post($row->id))

                                                    @foreach(has_child_post($row->id) as $child_row)

                                                        <option
                                                            value="{{$child_row->id}}"
                                                            {{ ($child_row->id == $data->post_parent) ? 'selected' : '' }}
                                                        >
                                                            —> {{$child_row->post_title}}
                                                        </option>

                                                        @if(has_child_post($child_row->id))

                                                            @foreach(has_child_post($child_row->id) as $grand_child_row)

                                                                <option
                                                                    value="{{$grand_child_row->id}}"
                                                                    {{ ($grand_child_row->id == $data->post_parent) ? 'selected' : '' }}
                                                                >
                                                                    — —> {{$grand_child_row->post_title}}
                                                                </option>

                                                                @if(has_child_post($grand_child_row->id))

                                                                    @foreach(has_child_post($grand_child_row->id) as $grand_child_row_x)

                                                                        <option
                                                                            value="{{$grand_child_row_x->id}}"
                                                                            {{ ($grand_child_row_x->id == $data->post_parent) ? 'selected' : '' }}
                                                                        >
                                                                            — — —> {{$grand_child_row_x->post_title}}
                                                                        </option>

                                                                    @endforeach

                                                                @endif

                                                            @endforeach

                                                        @endif

                                                    @endforeach

                                                @endif

                                            @endforeach

                                        </select>

                                        <div
                                            id="source-button"
                                            class="btn btn-primary btn-xs"
                                            style="display: none;"
                                        >
                                            &lt; &gt;
                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endif


                        {{-- Brief --}}
                        <div class="form-group">

                            <label class="col-lg-2 control-label">
                                Brief
                            </label>

                            <div class="col-lg-9">

                                <div class="bs-component">

                                    <textarea
                                        class="form-control my-editor"
                                        name="post_excerpt"
                                        rows="3"
                                    >{{$data->post_excerpt}}</textarea>

                                </div>

                            </div>

                        </div>


                        {{-- Content --}}
                        <div class="form-group">

                            <label class="col-lg-2 control-label">
                                Content
                            </label>

                            <div class="col-lg-10">

                                <div class="bs-component">

                                    <textarea
                                        class="form-control my-editor"
                                        id="editor2"
                                        name="post_content"
                                        rows="25"
                                    >{{$data->post_content}}</textarea>

                                </div>

                            </div>

                        </div>


                        {{-- Meta Keyword --}}
                        <div class="form-group">

                            <label class="col-lg-2 control-label">
                                Meta Key
                            </label>

                            <div class="col-lg-9">

                                <div class="bs-component">

                                    <input
                                        type="text"
                                        name="meta_keyword"
                                        class="form-control"
                                        value="{{$data->meta_keyword}}"
                                    />

                                </div>

                            </div>

                        </div>


                        {{-- Meta Description --}}
                        <div class="form-group">

                            <label class="col-lg-2 control-label">
                                Meta Description
                            </label>

                            <div class="col-lg-9">

                                <div class="bs-component">

                                    <textarea
                                        class="form-control"
                                        name="meta_description"
                                        rows="3"
                                    >{{$data->meta_description}}</textarea>

                                </div>

                            </div>

                        </div>


                        {{-- External Link --}}
                        <div class="form-group">

                            <label class="col-lg-2 control-label">
                                External Link
                            </label>

                            <div class="col-lg-9">

                                <div class="bs-component">

                                    <input
                                        type="text"
                                        name="external_link"
                                        class="form-control"
                                        value="{{$data->external_link}}"
                                    />

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Right Sidebar --}}
            <div class="col-md-3">

                <div class="admin-form nbms-post-sidebar">


                    {{-- Publish / Update --}}
                    <div class="sid_ mb10 nbms-post-card">

                        <div class="nbms-post-card-header">

                            <span>
                                <i class="fa fa-check-circle"></i>
                                Status
                            </span>

                            <strong>
                                {{ ($data->status == 1) ? 'Active' : 'InActive' }}
                            </strong>

                        </div>

                        <div class="nbms-post-card-body">

                            <input
                                type="submit"
                                class="btn btn-primary btn-sm nbms-publish-btn"
                                value="Update"
                            />

                        </div>

                    </div>


                    {{-- Template --}}
                    <div class="sid_ mb10 nbms-post-card">

                        <div class="nbms-post-card-header">
                            <i class="fa fa-file-text-o"></i>
                            Template
                        </div>

                        <div class="nbms-post-card-body">

                            <label class="field select">

                                <select id="template" name="template">

                                    @foreach($templates as $key=>$template)

                                        <option
                                            value="{{$key}}"
                                            {{ ($template == $data->template) ? 'selected' : '' }}
                                        >
                                            {{ ucfirst($template) }}
                                        </option>

                                    @endforeach

                                </select>

                                <i class="arrow"></i>

                            </label>

                        </div>

                    </div>


                    {{-- Child Template --}}
                    <div class="sid_ mb10 nbms-post-card">

                        <div class="nbms-post-card-header">
                            <i class="fa fa-sitemap"></i>
                            Child Template
                        </div>

                        <div class="nbms-post-card-body">

                            <label class="field select">

                                <select id="template_child" name="template_child">

                                    @foreach($templates_child as $key=>$template_child)

                                        <option
                                            value="{{$key}}"
                                            {{ ($template_child == $data->template_child) ? 'selected' : '' }}
                                        >
                                            {{ ucfirst($template_child) }}
                                        </option>

                                    @endforeach

                                </select>

                                <i class="arrow"></i>

                            </label>

                        </div>

                    </div>


                    {{-- Post Order --}}
                    <div class="sid_ mb10 nbms-post-card">

                        <div class="nbms-post-card-header">
                            <i class="fa fa-sort-numeric-asc"></i>
                            Post Order
                        </div>

                        <div class="nbms-post-card-body">

                            <input
                                type="number"
                                name="post_order"
                                class="form-control"
                                placeholder="Post Order"
                                value="{{$data->post_order}}"
                            />

                        </div>

                    </div>


                    {{-- Show in Home --}}
                    <div class="sid_ mb10 nbms-post-card">

                        <div class="nbms-post-card-body">

                            <label class="nbms-checkbox">

                                <input
                                    type="checkbox"
                                    name="show_in_home"
                                    value="{{ $data->show_in_home }}"
                                    {{ ($data->show_in_home == 1) ? 'checked' : '' }}
                                />

                                <span>
                                    Show in home
                                </span>

                            </label>

                        </div>

                    </div>


                    {{-- Homepage Order --}}
                    <div class="sid_ mb10 nbms-post-card">

                        <div class="nbms-post-card-header">
                            <i class="fa fa-home"></i>
                            Homepage Order
                        </div>

                        <div class="nbms-post-card-body">

                            <input
                                type="number"
                                name="home_order"
                                class="form-control"
                                placeholder="Insert Order Here"
                                value="{{$data->home_order}}"
                            />

                        </div>

                    </div>


                    {{-- File --}}
                    <div class="sid_ mb10 nbms-post-card">

                        <div class="nbms-post-card-header">
                            <i class="fa fa-file"></i>
                            File
                        </div>

                        <div class="nbms-post-card-body">

                            <div id="xedit-demo">

                                @if($data->icon)

                                    <span class="iconid{{$data->id}}">

                                        <a
                                            href="#{{$data->id}}"
                                            class="delete_icon"
                                        >
                                            X
                                        </a>

                                        <a
                                            href="{{ asset(env('PUBLIC_PATH').'uploads/large/' . $data->icon) }}"
                                            target="_blank"
                                        >
                                            <img
                                                src="{{ asset(env('PUBLIC_PATH').'images/download-icon.png') }}"
                                                width="50"
                                            />
                                        </a>

                                        <hr>

                                    </span>

                                @endif

                                <input type="file" name="icon" />

                            </div>

                        </div>

                    </div>


                    <?php /* ?>

                    <div class="sid_ mb10">

                        <h4> Icon </h4>

                        <label class="field select">

                            <select
                                id="template"
                                name="price"
                                style="font-family: 'FontAwesome';"
                            >

                                @if($data->price != NULL)

                                    <option value="{{$data->price}}" selected>
                                        {{$data->price}}
                                    </option>

                                @else

                                    <option value="" selected>
                                        Choose Icon
                                    </option>

                                @endif

                                <option value="coins">&#xf1c0; COINS </option>
                                <option value="chart-bar">&#xf080; BAR </option>
                                <option value="chart-line">&#xf201; LINE </option>
                                <option value="newspaper">&#xf1ea; NEWSPAPER </option>
                                <option value="user-plus">&#xf007; USER PLUS </option>
                                <option value="briefcase">&#xf0b1; BRIEFCASE </option>
                                <option value="lightbulb">&#xf0eb; LIGHTBULB </option>
                                <option value="glasses">&#xf000; GLASSESS </option>
                                <option value="clock">&#xf017; CLOCK </option>
                                <option value="bullseye">&#xf140; BULLSEYE </option>
                                <option value="wallet">&#xf07b; WALLET </option>
                                <option value="star">&#xf005; STAR</option>
                                <option value="handshake">HANDSHAKE </option>
                                <option value="fingerprint">FINGERPRINT </option>

                            </select>

                            <i class="arrow"></i>

                        </label>

                    </div>


                    <div class="sid_ mb10">

                        <h4> Thumbnail </h4>

                        <div class="hd_show_con">

                            <div id="xedit-demo">

                                @if($data->thumbnail)

                                    <span class="thumbnailid{{$data->id}}">

                                        <a
                                            href="#{{$data->id}}"
                                            class="delete_thumbnail"
                                        >
                                            X
                                        </a>

                                        <img
                                            src="{{ asset(env('PUBLIC_PATH').'uploads/medium/' . $data->thumbnail) }}"
                                            width="150"
                                        />

                                        <hr>

                                    </span>

                                @endif

                                <input type="file" name="thumbnail" />

                            </div>

                        </div>

                    </div>

                    <?php */?>


                    {{-- Featured Image --}}
                    <div class="sid_ mb10 nbms-post-card">

                        <div class="nbms-post-card-header">
                            <i class="fa fa-picture-o"></i>
                            Featured Image
                        </div>

                        <div class="nbms-post-card-body">

                            <div id="xedit-demo">

                                @if($data->page_thumbnail)

                                    <span class="page_thumbnailid{{$data->id}}">

                                        <a
                                            href="#{{$data->id}}"
                                            class="delete_pagethumbnail"
                                        >
                                            X
                                        </a>

                                        <a
                                            href="{{ asset(env('PUBLIC_PATH').'uploads/medium/' . $data->page_thumbnail) }}"
                                            target="_blank"
                                        >
                                            <img
                                                src="{{ asset(env('PUBLIC_PATH').'uploads/medium/' . $data->page_thumbnail) }}"
                                                width="150"
                                            />
                                        </a>

                                        <hr>

                                    </span>

                                @endif

                                <input type="file" name="page_thumbnail" />

                            </div>

                        </div>

                    </div>


                    {{-- Banner --}}
                    <div class="sid_ mb10 nbms-post-card">

                        <div class="nbms-post-card-header">
                            <i class="fa fa-picture-o"></i>
                            Banner
                        </div>

                        <div class="nbms-post-card-body">

                            <div id="xedit-demo">

                                @if($data->banner)

                                    <span class="bannerid{{$data->id}}">

                                        <a
                                            href="#{{$data->id}}"
                                            class="delete_banner"
                                        >
                                            X
                                        </a>

                                        <a
                                            href="{{ asset(env('PUBLIC_PATH').'uploads/medium/' . $data->banner) }}"
                                            target="_blank"
                                        >
                                            <img
                                                src="{{ asset(env('PUBLIC_PATH').'uploads/medium/' . $data->banner) }}"
                                                width="150"
                                            />
                                        </a>

                                        <hr>

                                    </span>

                                @endif

                                <input type="file" name="banner" />

                            </div>

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

$('.delete_icon').on('click',function(e){

    e.preventDefault();

    if(!confirm('Are you sure to delete?')) return false;

    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);

    $.ajax({

        type:'delete',

        url:"{{url('delete_icon') . '/'}}" + id,

        data:{_token:csrf},

        success:function(data){

            $('span.iconid' + id).remove();

        },

        error:function(data){

            alert(data + 'Error!');

        }

    });

});


$('.delete_thumbnail').on('click',function(e){

    e.preventDefault();

    if(!confirm('Are you sure to delete?')) return false;

    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);

    $.ajax({

        type:'delete',

        url:"{{url('delete_thumbnail') . '/'}}" + id,

        data:{_token:csrf},

        success:function(data){

            $('span.thumbnailid' + id).remove();

        },

        error:function(data){

            alert(data + 'Error!');

        }

    });

});


$('.delete_pagethumbnail').on('click',function(e){

    e.preventDefault();

    if(!confirm('Are you sure to delete?')) return false;

    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);

    $.ajax({

        type:'delete',

        url:"{{url('delete_pagethumbnail') . '/'}}" + id,

        data:{_token:csrf},

        success:function(data){

            $('span.page_thumbnailid' + id).remove();

        },

        error:function(data){

            alert(data + 'Error!');

        }

    });

});


$('.delete_banner').on('click',function(e){

    e.preventDefault();

    if(!confirm('Are you sure to delete?')) return false;

    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);

    $.ajax({

        type:'delete',

        url:"{{url('delete_banner') . '/'}}" + id,

        data:{_token:csrf},

        success:function(data){

            $('span.bannerid' + id).remove();

        },

        error:function(data){

            alert(data + 'Error!');

        }

    });

});


$(document).ready(function(){

    $('#post_title').on('keyup',function(){

        var post_title;

        post_title = $('#post_title').val();

        post_title = post_title.replace(/[^a-zA-Z0-9 ]+/g,"");

        post_title = post_title.replace(/\s+/g, "-");

        $('#uri').val(post_title);

    });

});


function myFunction() {

    var copyText = document.getElementById("myInput");

    copyText.select();

    copyText.setSelectionRange(0, 99999);

    document.execCommand("copy");

    alert("Copied the text: " + copyText.value);

}

</script>

@endsection
