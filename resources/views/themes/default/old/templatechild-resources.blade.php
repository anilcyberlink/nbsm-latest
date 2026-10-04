@extends('themes.default.common.master')
@section('title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('thumbnail', $data->page_thumbnail)
@section('content')
    <!-- section -->

    <section class="uk-section">
        <div class="uk-container uk-container-large">
            <div class="uk-grid" uk-grid>
                <div class="uk-width-expand@m">
                    <h1 class="uk-h3 uk-text-bold uk-margin">{{$data->post_title}}</h1>
                    <!--  -->
                    <div class="uk-border-light-top uk-border-light-bottom uk-margin-bottom uk-padding-small">
                        <div class="uk-child-width-expand@s uk-flex-middle" uk-grid>
                            <div class="uk-text-muted">{{$data->created_at->format('M')}} {{$data->created_at->format('d')}}, {{$data->created_at->format('Y')}} </div>
                            <div>
                                <!-- ShareThis BEGIN -->
                                <div class="sharethis-inline-share-buttons"></div>
                                <!-- ShareThis END -->
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    @if($data->banner)
                    <figure class="uk-feature-image uk-margin-medium-bottom" uk-lightbox="">
                        <a href="#" data-caption="{{$data->post_title}}"> <img src="{{asset('uploads/original/' . $data->banner)}}" alt=""> </a>
                        
                    </figure>
                    @endif
                    {!! $data->post_content !!}
                    
                    @if($data->icon)
                    <a class="uk-button uk-button-primary" target="_blank" href="{{asset('uploads/large/' . $data->icon)}}"><i class="fa fa-download uk-margin-small-right"></i>Download</a>
                    @endif
                </div>
               <div class="uk-width-1-3@m">
    <div style="z-index: 9;" uk-sticky="media: @m; offset: 60; bottom: #uk-stop-sticky;">
        <!--  -->
        <div class="bg-white uk-box-shadow-medium uk-margin-bottom">
            <div class="bg-primary uk-padding-small">
                <h1 class="uk-h5 uk-margin-remove text-white uk-text-bold">Related</h1>
            </div>
            @if(has_child_posts($data->post_parent)->count() > 0)
            <ul class="uk-list uk-list-divider">
                @foreach(has_child_posts($data->post_parent)->take(5) as $row)
        
                <li>
                    <a class="uk-display-block uk-padding-small uk-text-bold" href="{{url(post_parent($row->uri)->uri.'/'.geturl($row->uri))}}">
                       {{$row->post_title}}
                    </a>
                </li>
              @endforeach
            </ul>
            @endif
        </div>
        <!--  -->
        <!--  -->
        <div class="bg-white uk-box-shadow-medium ">
            <div class="bg-primary uk-padding-small">
                <h1 class="uk-h5 uk-margin-remove text-white uk-text-bold">Services</h1>
            </div>
            <ul class="uk-aside-list">
                @foreach($related as $val)
                <li><a href="{{url(post_parent($val->uri)->uri.'/'.geturl($val->uri))}}" title="">
                    <span class="uk-margin-small-right text-secondary" uk-icon="icon:minus; ratio: 1.2;"></span>{{$val->post_title}}
                    </a></li>
            @endforeach
        </div>
        <!--  -->
    </div>
</div>
            </div>
        </div>
        <div id="uk-stop-sticky"></div>
    </section>
    <!-- section end -->

    @stop
