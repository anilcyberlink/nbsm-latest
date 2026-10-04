@extends('themes.default.common.master')
@section('title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('thumbnail', $data->page_thumbnail)
@section('content')
    <!-- banner -->
    <section
        class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center" style="background:url({{asset('uploads/original/' . $data->banner)}});">
        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-home-banner uk-width-1-1 uk-position-z-index">
            <div class="uk-container uk-position-relative  uk-flex-middle uk-flex"
                 uk-height-viewport="expand: true; min-height: 400;">
                <div class="uk-width-1-2@l uk-width-1-1"
                     uk-scrollspy="cls: uk-animation-slide-top-small; target:h1, p, a;  delay: 100; repeat: false;">
                    <h1 class="uk-text-bold uk-h4 text-white uk-margin-remove">{{$pos_type->post_type}}</h1>
                    <h1 class="uk-text-bold text-white uk-margin-small">{{$data->post_title}}</h1>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>
    <!-- end banner -->
    <!-- section -->
    <section class="uk-section   bg-light uk-position-relative ">
        <div class="uk-container  ">
            <!--  -->
            @foreach($data_child as $val)
                @if($loop->iteration %2 != 0)
                    <div class="bg-white uk-box-shadow-small uk-margin-medium-bottom">
                        <div class="uk-grid-large uk-transition-toggle uk-list-home uk-flex-middle"
                             uk-height-match=".uk-same-height" uk-grid
                             uk-scrollspy="cls: uk-animation-slide-left-small; target:div, p;  delay: 100; repeat: false;">
                            <div class="uk-width-1-2@m  uk-flex-last uk-flex-first@m uk-same-height">
                                <div class="uk-padding">
                                    <div class="uk-margin-small-bottom">
                                        <h1 class="uk-h2 text-black">{{$val->post_title}}</h1>
                                    </div>
                                    <div class="uk-margin-medium">
                                        <p>{!! $val->post_excerpt !!}</p>
                                    </div>
                                    <a href="{{url(strtolower($data->uri).'/'.geturl($val->uri))}}"
                                       class="uk-button uk-button-primary-outline">Read More</a>
                                </div>
                            </div>
                            <div class="uk-width-1-2@m  uk-flex-first uk-flex-last@m">
                                <div class="uk-media-350 uk-position-relative uk-same-height">
                                    <a href="{{url(strtolower($data->uri).'/'.geturl($val->uri))}}">
                                         @if($val->page_thumbnail != null)
                                <img src="{{asset('uploads/original/' . $val->page_thumbnail)}}"  class="uk-transition-scale-down uk-transition-opaque">
                                @else
                                <img src="{{asset('images/default.png')}}"  class="uk-transition-scale-down uk-transition-opaque">
                                @endif
                                        
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="bg-white uk-box-shadow-small uk-margin-medium-bottom">
                        <div class="uk-grid-large uk-transition-toggle uk-list-home  uk-flex-middle"
                             uk-height-match=".uk-same-height" uk-grid
                             uk-scrollspy="cls: uk-animation-slide-left-small; target:div, p;  delay: 100; repeat: false;">
                            <div class="uk-width-1-2@m">
                                <div class="uk-media-350 uk-position-relative uk-same-height">
                                    <a href="{{url(strtolower($data->uri).'/'.geturl($val->uri))}}">
                                           @if($val->page_thumbnail != null)
                                <img src="{{asset('uploads/original/' . $val->page_thumbnail)}}"  class="uk-transition-scale-down uk-transition-opaque">
                                @else
                                <img src="{{asset('images/default.png')}}"  class="uk-transition-scale-down uk-transition-opaque">
                                @endif
                                    </a>
                                </div>
                            </div>
                            <div class="uk-width-1-2@m  uk-same-height">
                                <div class="uk-padding ">
                                    <div class="uk-margin-small-bottom">
                                        <h1 class="uk-h2 text-black">{{$val->post_title}}</h1>
                                    </div>
                                    <div class="uk-margin-medium">
                                        <p>{!! $val->post_excerpt !!}</p>
                                    </div>
                                    <a href="{{url(strtolower($data->uri).'/'.geturl($val->uri))}}" class="uk-button uk-button-primary-outline">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
            @endif

        @endforeach
        <!--  -->

        </div>
    </section>
    <!-- end section -->
@endsection
