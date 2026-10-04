@extends('themes.default.common.master')
@section('post_title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('content')
    <!-- banner -->
    <section class="bg-primary-dark uk-position-relative uk-flex uk-flex-middle " uk-height-viewport="expand: true; min-height: 300;">
        <div class="uk-width-1-1 uk-position-z-index">
            <div class="uk-container uk-container-large uk-position-relative  uk-flex-middle uk-flex" uk-height-viewport="expand: true; min-height: 550;">
                <div class="uk-width-1-2@l uk-width-1-1" uk-scrollspy="cls: uk-animation-slide-top-small; target:h1, p, a;  delay: 100; repeat: false;">
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
    <section class="uk-section bg-white">
        <div class="uk-container uk-container-large">
         {!! $data->content !!}
        </div>
    </section>
    <!-- end section -->
@stop
