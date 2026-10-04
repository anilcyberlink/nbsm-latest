@extends('themes.default.common.master')
@section('post_title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('content')

    <!-- banner -->
    <section class="bg-primary-dark uk-position-relative uk-flex uk-flex-middle "
             uk-height-viewport="expand: true; min-height: 300;">
        <div class="uk-width-1-1 uk-position-z-index">
            <div class="uk-container uk-container-large uk-position-relative  uk-flex-middle uk-flex"
                 uk-height-viewport="expand: true; min-height: 550;">
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
    <section class="uk-section bg-light">
        <div class="uk-container uk-container-large">
            <ul class="uk-grid-medium uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-2@s"
                uk-height-match="target:.uk-card-default" uk-grid
                uk-scrollspy="cls: uk-animation-slide-left-small; target:div;  delay: 20; repeat: false;">
                <!--  -->
                @foreach($posts->where('post_parent','!=',0) as $value)

                    <li>
                        <div>
                            <div class="bg-white">
                                <div class="uk-media-250 uk-position-relative">
                                    <a href="{{url(get_parent_name($value->id)->uri.'/'.geturl($value->uri))}}">
                                        @if($value->page_thumbnail != null)
                                      <img src="{{asset('uploads/original/' . $value->page_thumbnail)}}">
                                        @else
                                        <img src="{{asset('images/default.png')}}">
                                        @endif
                                        
                                    </a>
                                    <div class="uk-position-top">
                                        <a href="{{url(get_parent_name($value->id)->uri)}}.html"><span class="uk-badge bg-1 uk-margin-small">{{get_parent_name($value->id)->post_title}}</span></a>
                                    </div>
                                </div>
                                <div class="uk-card uk-card-default  uk-card-body">
                                    <h1 class="uk-h4 uk-text-bold uk-margin-remove"><a href="{{url(get_parent_name($value->id)->uri.'/'.geturl($value->uri))}}">
                                            {{$value->post_title}}
                                   </a></h1>
                                    <div class="uk-text-small uk-margin">
                                        <p>{!! $value->post_excerpt !!}</p>
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
    
    {{$posts->links('themes.default.common.pagination')}}
   
@stop
