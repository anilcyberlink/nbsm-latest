@extends('themes.default.common.master')
@section('title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('thumbnail', $data->page_thumbnail)
@section('content')
    <!-- banner -->
    <section
        class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-bottom-center" style="background:url({{asset('uploads/original/' . $data->banner)}});">
        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-home-banner uk-width-1-1 uk-position-z-index">
            <div class="uk-container uk-position-relative  uk-flex-middle uk-flex"
                 uk-height-viewport="expand: true; min-height: 500;">
                <div class="uk-width-1-2@l uk-width-1-1"
                     uk-scrollspy="cls: uk-animation-slide-top-small; target:h1, p, a;  delay: 100; repeat: false;">
                    <h1 class="uk-text-bold uk-h4 text-white uk-margin-remove">{{get_parent_name($data->id)}}</h1>
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
        <div class="uk-container">
            <!--  -->
            <div class="bg-white uk-box-shadow-small uk-margin-medium-bottom">
                <div class="uk-padding">
                    <h1 class="uk-h2 text-primary uk-text-bold">{{$data->sub_title}}</h1>
                    <p class="uk-text-bold">{!! $data->post_content !!}</p>
                    <div>
                        <ul uk-accordion class="uk-accordion-outline">
                            @foreach($data_child as $val)
                                <li>
                                    <a class="uk-accordion-title" href="#">{{$val->post_title}}</a>
                                    <div class="uk-accordion-content">
                                        {!! $val->post_content !!}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            @foreach($associated_posts as $val)
                @if($loop->iteration %2 != 0)
                <div class="bg-white uk-box-shadow-small uk-margin-medium-bottom">
                    <div class="uk-grid-large uk-transition-toggle uk-list-home uk-flex-middle"
                         uk-height-match=".uk-same-height" uk-grid
                         uk-scrollspy="cls: uk-animation-slide-left-small; target:div, p;  delay: 100; repeat: false;">

                        <div class="uk-width-1-2@m  uk-flex-last uk-flex-first@m uk-same-height">
                            <div class="uk-padding uk-padding-remove-right">
                                <div class="uk-margin-small-bottom ">
                                    <h1 class="uk-h2  text-primary">
                                        {{$val->title}}
                                    </h1>
                                </div>
                                <div class="uk-margin-medium">
                                    {!! $val->brief !!}
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-2@m  uk-flex-first uk-flex-last@m">
                            <div class="uk-media-350 uk-position-relative uk-same-height">
                              
                                    <img src="{{asset('uploads/original/' . $val->thumbnail)}}"
                                         class="uk-transition-scale-down uk-transition-opaque"
                                         alt="">
                               
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
                               
                                    <img src="{{asset('uploads/original/' . $val->thumbnail)}}" class="uk-transition-scale-down uk-transition-opaque"
                                         alt="">
                                
                            </div>
                        </div>
                        <div class="uk-width-1-2@m  uk-same-height">
                            <div class="uk-padding uk-padding-remove-left">
                                <div class="uk-margin-small-bottom">
                                    <h1 class="uk-h2 text-primary">{{$val->title}}</h1>
                                </div>
                                <div class="uk-margin-medium">
                                   {!! $val->brief !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

        @endforeach
        <!--  -->
            <!--  -->
            <!--  -->
        </div>
    </section>
    <!-- end section -->

@stop
