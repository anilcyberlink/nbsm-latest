@extends('themes.default.common.master')
@section('title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('thumbnail', $data->page_thumbnail)
@section('content')

    <!-- banner -->
    <section class="bg-primary-dark uk-position-relative uk-flex uk-flex-middle " uk-height-viewport="expand: true; min-height: 300;">
        <div class="uk-width-1-1 uk-position-z-index">
            <div class="uk-container uk-container-large uk-position-relative  uk-flex-middle uk-flex" uk-height-viewport="expand: true; min-height: 550;">
                <div class="uk-width-1-2@l uk-width-1-1" uk-scrollspy="cls: uk-animation-slide-top-small; target:h1, p, a;  delay: 100; repeat: false;">
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
    <section class="uk-section bg-light">
        <div class="uk-container uk-container-large">
            <ul class="uk-grid-medium uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-2@s" uk-height-match="target:.uk-card-default" uk-grid  uk-scrollspy="cls: uk-animation-slide-left-small; target:div;  delay: 20; repeat: false;">
                <!--  -->
                @foreach($data_child as $val)
                <li>
                    <div>
                        <div class="bg-white">

                            <div class="uk-media-250 uk-position-relative">  <a href="{{url(strtolower($data->uri).'/'.geturl($val->uri))}}">
                                @if($val->page_thumbnail != null)
                                <img src="{{asset('uploads/original/' . $val->page_thumbnail)}}">
                                @else
                                <img src="{{asset('images/default.png')}}">
                                @endif
                                </a>
                                </div>
                            <div class="uk-card uk-card-default  uk-card-body">
                                <h1 class="uk-h4 uk-text-bold uk-margin-remove">  <a href="{{url(strtolower($data->uri).'/'.geturl($val->uri))}}">{{$val->post_title}}</a></h1>
                                <div class="uk-text-small uk-margin">
                                    <p>{!! $val->post_excerpt !!}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </li>
                @endforeach
                <!--  -->

            </ul>
        </div>
    </section>
    <!-- section end -->
{{$data_child->links('themes.default.common.pagination')}}

    @stop
