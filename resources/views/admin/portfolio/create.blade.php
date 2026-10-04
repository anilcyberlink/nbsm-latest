@extends('admin.master')

@section('title', 'Our Trades')

@section('breadcrumb')
    <a href="{{ route('our-trades.index') }}" class="nbms-btn-secondary btn-sm">
        <i class="fa fa-list"></i> List
    </a>
@endsection

@section('content')

    <form class="form-horizontal trades-form" role="form" action="{{ route('our-trades.store') }}" method="post"
        enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="trades-page">

            {{-- Page Header --}}
            <div class="trades-header">

                <div>
                    <h2>
                        <i class="fa fa-briefcase"></i>
                        New Trade
                    </h2>

                    <p>
                        Add a new trade and its related information
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
                                        placeholder="Enter trade title" />

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
                                                <option value="{{ $row->id }}">
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

                                    <textarea class="form-control" name="brief" rows="3"></textarea>

                                </div>

                            </div>


                            {{-- UID --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    UID
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" name="content" class="form-control" placeholder="Enter UID" />

                                </div>

                            </div>


                            {{-- Duration --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Duration of course
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" name="client_name" class="form-control" />

                                </div>

                            </div>


                            {{-- Training Hours --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Total training hours
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" name="country" class="form-control" />

                                </div>

                            </div>


                            {{-- Qualification --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Minimum qualification of the participant
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" name="service" class="form-control" />

                                </div>

                            </div>


                            {{-- Target Group --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Target group
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" name="year" class="form-control" />

                                </div>

                            </div>


                            {{-- Medium --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Medium of instruction
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" name="meta_keyword" class="form-control" />

                                </div>

                            </div>


                            {{-- Method --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Method
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" name="meta_description" class="form-control" />

                                </div>

                            </div>


                            {{-- Group Structure --}}
                            <div class="form-group">

                                <label class="col-lg-2 control-label">
                                    Group structure
                                </label>

                                <div class="col-lg-9">

                                    <input type="text" name="external_link" class="form-control" />

                                </div>

                            </div>


                        </div>

                    </div>

                </div>


                {{-- Sidebar --}}
                <div class="col-md-3">

                    <div class="admin-form trades-sidebar">


                        {{-- Publish --}}
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

                                <input type="submit" class="btn btn-primary btn-sm trades-publish-btn"
                                    value="Publish" />

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
                                    value="{{ $ordering }}" />

                            </div>

                        </div>


                        {{-- Icon --}}
                        <div class="sid_ mb10 trades-card">

                            <div class="trades-card-header">
                                <i class="fa fa-star"></i>
                                Icon
                            </div>

                            <div class="trades-card-body">

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

            $('#title').on('keyup', function() {

                var title;

                title = $('#title').val();

                title = title.replace(/[^a-zA-Z0-9 ]+/g, "");

                title = title.replace(/\s+/g, "-");

                $('#uri').val(title);

            });

        });


        $('.backlink').click(function() {

            var url = '<?= url()->previous() ?>';

            window.location = url;

        });
    </script>

@endsection
