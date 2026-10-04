@extends('themes.default.common.master')
@section('post_title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('content')

    <!-- banner -->
    <section
        class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center" style="background:url({{asset('uploads/original/' . $data->banner)}});">
        <div class="uk-overlay-primary  uk-position-cover "></div>
        <div class="uk-home-banner uk-width-1-1 uk-position-z-index">
            <div class="uk-container uk-container-large uk-position-relative  uk-flex-middle uk-flex"
                 uk-height-viewport="expand: true; min-height: 400;">
                <div class="uk-width-1-2@l uk-width-1-1"
                     uk-scrollspy="cls: uk-animation-slide-top-small; target:h1, p, a;  delay: 100; repeat: false;">

                    <h1 class="uk-text-bold text-white uk-margin-small">{{$data->post_type}}</h1>
                </div>

            </div>
        </div>
        </div>
        </div>
        </div>
    </section>
    <!-- end banner -->
    <!-- section -->
  <!-- section -->
        <section class="uk-section  bg-white uk-position-relative ">
             <div class="uk-container uk-container-large">
            <!--  -->
            @foreach($data->posts as $value)
                @if($loop->iteration %2 != 0)

                    <div class="uk-grid-large    uk-transition-toggle uk-list-home uk-flex-middle" uk-grid
                         uk-scrollspy="cls: uk-animation-slide-left-small; target:div, p;  delay: 100; repeat: false;">
                        <div class="uk-width-1-2@m  uk-flex-last uk-flex-first@m">
                            <div class="uk-padding-small uk-padding-remove-left">
                                <div class="uk-margin-small-bottom">
                                    <h1 class="uk-h2 text-black">{{$value->post_title}}</h1>
                                </div>
                                <div class="uk-home-list-description">
                                    <p>{!! $value->post_excerpt !!}</p>
                                </div>
                                <a href="{{ url(geturl($value['uri'], $value['page_key'])) }}"
                                   class="uk-button uk-button-primary-outline">Read More</a>
                            </div>
                        </div>
                        <div class="uk-width-1-2@m  uk-flex-first uk-flex-last@m">
                            <div class="uk-media-350 uk-position-relative">
                                <a href="{{ url(geturl($value['uri'], $value['page_key'])) }}">
                                    
                                    @if($value->page_thumbnail != null)
                                      <img src="{{asset('uploads/original/' . $value->page_thumbnail)}}"  class="uk-transition-scale-down uk-transition-opaque">
                                        @else
                                        <img src="{{asset('images/default.png')}}"  class="uk-transition-scale-down uk-transition-opaque">
                                        @endif
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="uk-grid-large  uk-transition-toggle uk-list-home  uk-flex-middle" uk-grid
                         uk-scrollspy="cls: uk-animation-slide-left-small; target:div, p;  delay: 100; repeat: false;">
                        <div class="uk-width-1-2@m">
                            <div class="uk-media-350">
                                <a href="{{ url(geturl($value['uri'], $value['page_key'])) }}">
                                    @if($value->page_thumbnail != null)
                                      <img src="{{asset('uploads/original/' . $value->page_thumbnail)}}"  class="uk-transition-scale-down uk-transition-opaque">
                                        @else
                                        <img src="{{asset('images/default.png')}}"  class="uk-transition-scale-down uk-transition-opaque">
                                        @endif
                                </a>
                            </div>
                        </div>
                        <div class="uk-width-1-2@m">
                            <div class="uk-padding-small uk-padding-remove-right">
                                <div class="uk-margin-small-bottom">
                                    <h1 class="uk-h2 text-black">{{$value->post_title}}</h1>
                                </div>
                                <div class="uk-home-list-description">
                                    <p>{!! $value->post_excerpt !!}</p>
                                </div>
                                <a href="{{ url(geturl($value['uri'], $value['page_key'])) }}" class="uk-button uk-button-primary-outline">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
            @endif
        @endforeach
        <!--  -->
         </div>
        </section>
        <!-- end section -->
        <!-- section -->
        <section class="uk-section-small   bg-primary uk-position-relative ">
           <div class="uk-container uk-container-large">
            <!-- counter -->
            <div class="uk-child-width-1-3@s uk-child-width-1-2  uk- uk-text-center    uk-grid-small   text-white  " id="counter" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:div, div;  delay: 20; repeat: false;">
               @if($setting->field1)
                <div>
                    <div class="uk-padding">
                       <h2 class="uk-h1 text-white uk-text-bold uk-margin-remove"> <span class="count" data-count="{{$setting->field1}}"></span>+</h2>
                        <p class="uk-margin-remove uk-text-bold">{{$setting->website2}}</p>
                    </div>
                </div>
                @endif
                 @if($setting->field2)
                <div>
                    <div class="uk-padding">
                        <h2 class="uk-h1 text-white uk-text-bold uk-margin-remove"> <span class="count" data-count="{{$setting->field2}}"></span>+</h2>
                        <p class="uk-margin-remove uk-text-bold">{{$setting->location_link}}</p>
                    </div>
                </div>
                 @endif
                 @if($setting->field3)
                <div>
                    <div class="uk-padding">
                       <h2 class="uk-h1 text-white uk-text-bold uk-margin-remove"> <span class="count" data-count="{{$setting->field3}}"></span></h2>
                        <p class="uk-margin-remove uk-text-bold">{{$setting->address2}}</p>
                    </div>
                </div>
                 @endif
                 @if($setting->field4)
                <div class="uk-padding">
                    <h2 class="uk-h1 text-white uk-text-bold uk-margin-remove"> <span class="count" data-count="{{$setting->field4}}"></span></h2>
                    <p class="uk-margin-remove uk-text-bold">{{$setting->location2}}</p>
                </div>
                 @endif
            </div>
            <!-- counter end -->
        </div>
    </section>
    <!-- end section -->







@stop
