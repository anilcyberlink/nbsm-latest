@extends('themes.default.common.master')
@section('title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('thumbnail', $data->page_thumbnail)
@section('content')
    <!-- banner -->
    <section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-bottom-center" style="background:url('{{asset('uploads/original/'.$data->banner)}}');">
        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-home-banner uk-width-1-1 uk-position-z-index">
            <div class="uk-container uk-container-large uk-position-relative  uk-flex-middle uk-flex"
                 uk-height-viewport="expand: true; min-height: 550;">
                <div class="uk-width-1-2@l uk-width-1-1"
                     uk-scrollspy="cls: uk-animation-slide-top-small; target:h1, p, a;  delay: 100; repeat: false;">
                    <h1 class="uk-text-bold uk-h4 text-white uk-margin-remove">{{$pos_type->post_type}}</h1>
                    <h1 class="uk-text-bold text-white uk-margin-small">{{$data->post_title}}</h1>
                </div>

            </div>
        </div>
    </section>
    <!-- end banner -->

    <!-- section -->
    <section class="uk-section bg-white">
        <div class="uk-container uk-container-large">
            <div class="uk-grid-large" uk-grid>
                <div class="uk-width-expand@s">
                   {!! $data->post_content !!}
                </div>

                <div class="uk-width-1-3@s">
                    <div style="z-index: 9;" uk-sticky="offset: 150; bottom: #uk-stop-sticky;">

                        <div class="bg-white uk-box-shadow-medium ">
                            <div class="bg-primary uk-padding-small">
                                <h1 class="uk-h5 uk-margin-remove text-white uk-text-bold">{{$pos_type->post_type}}</h1>
                            </div>
                             @if(has_posts($data->post_type)->count() > 0)
                            <ul class="uk-aside-list">
                                @foreach(has_posts($data->post_type) as $row)
                                <li><a href="{{ url(geturl($row['uri'], $row['page_key'])) }}" title="" class="{{(Request::segment(1) == geturl($row['uri'],$row['page_key']))?'uk-active':''}}"><span
                                            class="uk-margin-small-right text-secondary"
                                            uk-icon="icon:minus; ratio: 1.2;"></span>{{$row->post_title}}</a>
                                </li>
                                @endforeach
                            </ul>
                             @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="uk-stop-sticky"></div>
    </section>
    <!-- end section -->
@endsection
