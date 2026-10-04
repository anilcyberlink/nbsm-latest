@extends('admin.master')

@section('title', Request::segment(2))

@section('breadcrumb')

    <button type="button" class="btn btn-default btn-sm backlink">
        <i class="fa fa-angle-double-left" aria-hidden="true"></i>
        Back
    </button>

    <a href="{{ route('admin.post.index', Request::segment(2)) }}" class="btn btn-default btn-sm backlink">
        <i class="fa fa-list" aria-hidden="true"></i>
        Show List
    </a>

@endsection

@section('content')

    <form class="form-horizontal nbms-post-form" role="form" action="{{ route('admin.post.store', Request::segment(2)) }}"
        method="post" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="nbms-post-page">

            {{-- Page Header --}}
            <div class="nbms-post-header">

                <div>
                    <h2 class="nbms-post-title">
                        <i class="fa fa-files-o"></i>
                        {{ posttype(Request::segment(2))->post_type }}
                    </h2>

                    <p class="nbms-post-subtitle">
                        Create a new {{ strtolower(posttype(Request::segment(2))->post_type) }}
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
                                New Post
                            </span>
                        </div>

                        <div class="panel-body">

                            <input type="hidden" name="post_date" value="<?= date('Y-m-d H:i:s') ?>" />
                            <input type="hidden" name="post_type" value="{{ Request::segment(2) }}" />


                            {{-- Title --}}
                            <div class="form-group">
                                <label class="col-lg-2 control-label">
                                    Title
                                </label>

                                <div class="col-lg-9">
                                    <input type="text" id="post_title" name="post_title" class="form-control"
                                        placeholder="Enter post title" />

                                    <input type="hidden" id="uri" name="uri" />
                                </div>
                            </div>


                            {{-- Sub Title --}}
                            <div class="form-group">
                                <label class="col-lg-2 control-label">
                                    Sub Title
                                </label>

                                <div class="col-lg-9">
                                    <input type="text" name="sub_title" class="form-control"
                                        placeholder="Enter sub title" />
                                </div>
                            </div>


                            <?php /*?> ?>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">UID</label>
                                <div class="col-lg-9">
                                    <input type="text" name="uid" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">
                                    Associated Title
                                </label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="associated_title" />
                                </div>
                            </div>
                            <?php */?>


                            {{-- Category --}}
                            <div class="form-group">
                                <label class="col-lg-2 control-label">
                                    Category
                                </label>

                                <div class="col-lg-9">

                                    <select name="category" class="form-control">

                                        <option value="0">
                                            Select Category
                                        </option>

                                        @if ($category)

                                            @foreach ($category as $row)
                                                <option value="{{ $row->id }}">
                                                    {{ $row->category }}
                                                </option>
                                            @endforeach

                                        @endif

                                    </select>

                                </div>
                            </div>


                            {{-- Parent --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Select Parent
                                </label>

                                <div class="col-lg-9">

                                    <select name="post_parent" class="form-control">

                                        <option value="0">
                                            Choose Parent
                                        </option>

                                        @if ($parent_post)

                                            @foreach ($parent_post as $row)
                                                <option value="{{ $row->id }}">
                                                    {{ $row->post_title }}
                                                </option>

                                                @if (has_child_post($row->id))
                                                    @foreach (has_child_post($row->id) as $child_row)
                                                        <option value="{{ $child_row->id }}">
                                                            —> {{ $child_row->post_title }}
                                                        </option>

                                                        @if (has_child_post($child_row->id))
                                                            @foreach (has_child_post($child_row->id) as $grand_child_row)
                                                                <option value="{{ $grand_child_row->id }}">
                                                                    — —> {{ $grand_child_row->post_title }}
                                                                </option>

                                                                @if (has_child_post($grand_child_row->id))
                                                                    @foreach (has_child_post($grand_child_row->id) as $grand_child_row_x)
                                                                        <option value="{{ $grand_child_row_x->id }}">
                                                                            — — —> {{ $grand_child_row_x->post_title }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endif
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

                                    <textarea class="form-control my-editor" name="post_excerpt" rows="3"></textarea>

                                </div>

                            </div>


                            {{-- Content --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Content
                                </label>

                                <div class="col-lg-10">

                                    <textarea class="form-control my-editor" name="post_content" rows="25"></textarea>

                                </div>

                            </div>


                            {{-- Meta Keyword --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Meta Key
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" name="meta_keyword" class="form-control"
                                        placeholder="Enter meta keywords" />

                                </div>

                            </div>


                            {{-- Meta Description --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Meta Description
                                </label>

                                <div class="col-lg-9">

                                    <textarea class="form-control" name="meta_description" rows="3" placeholder="Enter meta description"></textarea>

                                </div>

                            </div>


                            {{-- External Link --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    External Link
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" name="external_link" class="form-control"
                                        placeholder="http://example.com" />

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Right Sidebar --}}
                <div class="col-md-3">

                    <div class="admin-form nbms-post-sidebar">


                        {{-- Publish --}}
                        <div class="sid_ mb10 nbms-post-card">

                            <div class="nbms-post-card-header">
                                <i class="fa fa-check-circle"></i>
                                Publish
                            </div>

                            <div class="nbms-post-card-body">

                                <input type="submit" class="btn btn-primary btn-sm nbms-publish-btn" value="Publish" />

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

                                        @foreach ($templates as $key => $template)
                                            <option value="{{ $key }}">
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

                                        @foreach ($templates_child as $key => $template_child)
                                            <option value="{{ $key }}">
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

                                <input type="number" name="post_order" class="form-control"
                                    placeholder="Insert Number Here" value="{{ $post_order }}" />

                            </div>

                        </div>


                        {{-- Homepage Order --}}
                        <div class="sid_ mb10 nbms-post-card">

                            <div class="nbms-post-card-header">
                                <i class="fa fa-home"></i>
                                Homepage Order
                            </div>

                            <div class="nbms-post-card-body">

                                <input type="number" name="home_order" class="form-control"
                                    placeholder="Insert Order Here" />

                            </div>

                        </div>


                        <?php /*?> ?>

                        <div class="sid_ mb10">
                            <h4>Icon</h4>

                            <label class="field select">

                                <select id="template" name="price" style="font-family: 'FontAwesome';">

                                    <option value="" selected>
                                        Choose Icon
                                    </option>

                                    <option value="coins">&#xf1c0; COINS</option>
                                    <option value="chart-bar">&#xf080; BAR</option>
                                    <option value="chart-line">&#xf201; LINE</option>
                                    <option value="newspaper">&#xf1ea; NEWSPAPER</option>
                                    <option value="user-plus">&#xf007; USER PLUS</option>
                                    <option value="briefcase">&#xf0b1; BRIEFCASE</option>
                                    <option value="lightbulb">&#xf0eb; LIGHTBULB</option>
                                    <option value="glasses">&#xf000; GLASSESS</option>
                                    <option value="clock">&#xf017; CLOCK</option>
                                    <option value="bullseye">&#xf140; BULLSEYE</option>
                                    <option value="wallet">&#xf07b; WALLET</option>
                                    <option value="star">&#xf005; STAR</option>
                                    <option value="handshake">HANDSHAKE</option>
                                    <option value="fingerprint">FINGERPRINT</option>

                                </select>

                                <i class="arrow"></i>

                            </label>

                        </div>

                        <?php */?>


                        {{-- Show in Home --}}
                        <div class="sid_ mb10 nbms-post-card">

                            <div class="nbms-post-card-body">

                                <label class="nbms-checkbox">

                                    <input type="checkbox" name="show_in_home" value="1" />

                                    <span>
                                        Show in home
                                    </span>

                                </label>

                            </div>

                        </div>


                        {{-- File --}}
                        <div class="sid_ mb10 nbms-post-card">

                            <div class="nbms-post-card-header">
                                <i class="fa fa-file"></i>
                                File
                            </div>

                            <div class="nbms-post-card-body">

                                <input type="file" name="icon" />

                            </div>

                        </div>


                        <?php /*?> ?>

                        <div class="sid_ mb10">
                            <h4>Thumbnail</h4>

                            <div class="hd_show_con">

                                <div id="xedit-demo">
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

                                <input type="file" name="page_thumbnail" />

                            </div>

                        </div>


                        {{-- Banner --}}
                        <div class="sid_ mb10 nbms-post-card">

                            <div class="nbms-post-card-header">
                                <i class="fa fa-image"></i>
                                Banner
                            </div>

                            <div class="nbms-post-card-body">

                                <input type="file" name="banner" />

                            </div>

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

            $('#post_title').on('keyup', function() {

                var post_title;

                post_title = $('#post_title').val();

                post_title = post_title.replace(/[^a-zA-Z0-9 ]+/g, "");

                post_title = post_title.replace(/\s+/g, "-");

                $('#uri').val(post_title);

            });

        });


        // Go back link
        $('.backlink').click(function() {

            var url = '<?= url()->previous() ?>';

            window.location = url;

        });
    </script>

@endsection
