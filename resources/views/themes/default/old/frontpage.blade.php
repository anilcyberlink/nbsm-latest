@extends('themes.default.common.master')
@section('content')
     <!-- banner -->
 @if($banner)
<section class="uk-cover-container uk-position-relative uk-flex uk-flex-middle uk-background-norepeat uk-background-cover uk-background-top-center" uk-parallax="bgx: 80, 80 ;bgy: -50, -200"   style="background:url(images/banner-1.jpg);">
   <div class="uk-position-relative" id="ytbg3" data-ytbg-fade-in="true" data-ytbg-mute-button="true" data-youtube="{{$banner->video}}"></div>
   <div class="uk-overlay-primary  uk-position-cover "></div>
   <div class="uk-home-banner uk-width-1-1 uk-position-z-index">
      <div class="uk-container uk-container-large uk-position-relative  uk-flex-middle uk-flex" uk-height-viewport="expand: true; min-height: 600;">
         <div class="uk-width-1-2@l uk-width-1-1" uk-scrollspy="cls: uk-animation-slide-top-small; target:h1, p, a;  delay: 100; repeat: false;">
            <h1 class="uk-text-bold text-white uk-margin-remove">{{$banner->title}}</h1>
            <div class="uk-home-list-description">
               <p class="text-white">
                   {{$banner->caption}}
                   </p>
            </div>
            <a href="{{$banner->link}}" class="uk-button uk-button-large uk-button-white">Learn More</a>
         </div>

         <div class="uk-width-1-2@s uk-visible@m">
         <div class="">
         <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 180 150"  xml:space="preserve">
            <style type="text/css">
               .one{fill:var(--bg-white); opacity: .4;}
               .two{fill:var(--bg-primary); opacity: .8;}
               .three{fill:var(--bg-secondary); opacity: .8;}
               .four{fill:var(--bg-primary); opacity: .8;}
            </style>
            <g>
               <polygon class="one" points="4.14,144 151,144 151,139 17.86,139 167,13.69 167,135.38 167,137 172,137 172,2.96 	"/>
               <rect x="167" y="139" class="two" width="5" height="5"/>
               <rect x="160" y="139" class="three" width="5" height="5"/>
               <rect x="153" y="139" class="four" width="5" height="5"/>
            </g>
         </svg>
      </div>

</div>
         </div>
      </div>
   </div>
   </div>
</section>
@endif
<!-- end banner --> 

    <!-- section -->
    <section class="uk-section bg-white uk-position-relative ">
        <div class="uk-container uk-container-large">
            <!--  -->
            @foreach($publication as $value)
                @if($loop->iteration %2 != 0)
            <div class="uk-grid-large    uk-transition-toggle uk-list-home uk-flex-middle" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:div, p;  delay: 100; repeat: false;">
                <div class="uk-width-1-2@m  uk-flex-last uk-flex-first@m">
                    <div class="uk-padding-small uk-padding-remove-left">
                        <h4 class="uk-text-uppercase   uk-margin-small-bottom text-secondary">Publication <span class="uk-margin-small-right text-secondary" uk-icon="icon:minus; ratio: 2;"></span></h4>
                        <div class="uk-margin-small-bottom">
                            <h1 class="uk-h2 text-black">{{$value->post_title}}</h1>
                        </div>
                        <div class="uk-home-list-description">
                            <p>{!! $value->post_excerpt !!}</p>
                        </div>
                        <a href="{{ url(post_parent($value->uri)->uri.'/'.geturl($value['uri'], $value['page_key'])) }}" class="uk-button uk-button-primary-outline">Read More</a>
                    </div>
                </div>
                <div class="uk-width-1-2@m  uk-flex-first uk-flex-last@m">
                    <div class="uk-media-350 uk-position-relative">
                        <a href="{{ url(post_parent($value->uri)->uri.'/'.geturl($value['uri'], $value['page_key'])) }}">
                             @if($value->page_thumbnail != null)
                                      <img src="{{asset('uploads/original/' . $value->page_thumbnail)}}" class="uk-transition-scale-down uk-transition-opaque">
                                        @else
                                        <img src="{{asset('images/default.png')}}">
                                        @endif
                           
                        </a>
                    </div>
                </div>
            </div>
            <!--  -->
            @else
            <!--  -->
            <div class="uk-grid-large  uk-transition-toggle uk-list-home  uk-flex-middle" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small; target:div, p;  delay: 100; repeat: false;">
                <div class="uk-width-1-2@m">
                    <div class="uk-media-350">
                        <a href="{{ url(post_parent($value->uri)->uri.'/'.geturl($value['uri'], $value['page_key'])) }}">
                             @if($value->page_thumbnail != null)
                                      <img src="{{asset('uploads/original/' . $value->page_thumbnail)}}" class="uk-transition-scale-down uk-transition-opaque">
                                        @else
                                        <img src="{{asset('images/default.png')}}">
                                        @endif
                        </a>
                    </div>
                </div>
                <div class="uk-width-1-2@m">
                    <div class="uk-padding-small uk-padding-remove-right">
                        <h4 class="uk-text-uppercase  uk-margin-small-bottom text-secondary">Publication <span class="uk-margin-small-right text-secondary" uk-icon="icon:minus; ratio: 2;"></span></h4>
                        <div class="uk-margin-small-bottom">
                            <h1 class="uk-h2 text-black">{{$value->post_title}}</h1>
                        </div>
                        <div class="uk-home-list-description">
                            <p>{!! $value->post_excerpt !!}</p>
                        </div>
                        <a href="{{ url(post_parent($value->uri)->uri.'/'.geturl($value['uri'], $value['page_key'])) }}" class="uk-button uk-button-primary-outline">Read More</a>
                    </div>
                </div>
            </div>
            <!--  -->
            @endif
        @endforeach
          
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
    <!-- section -->
    <section class="uk-section bg-light uk-position-relative ">
        <div class="uk-container uk-container-large">
            <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-medium">
                <div>
                    <h1 class="uk-h2 text-black uk-text-bold">What we do</h1>
                </div>
                <div>
                    <a class="uk-button-text" href="{{ url('page/' . posttype_url($service->uri)) }}">View All</a>
                </div>
            </div>
            <ul class="uk-grid-medium uk-child-width-1-4@l uk-child-width-1-2@m uk-child-width-1-2@s uk-margin-medium-bottom" uk-height-match="target:.uk-card-default" uk-grid uk-scrollspy="cls: uk-animation-slide-top-small; target:div, h1, p, a;  delay: 20; repeat: false;">
                <!--  -->
                @foreach ($navigations as $row)
                    @if ($loop->iteration == 2)
                    @if (has_posts($row->id))
                        @foreach (has_posts($row->id) as $_row)
                <li>
                    <div>
                        <div class="bg-white  uk-overflow-hidden uk-box-shadow-medium   uk-transition-toggle">
                            <div class="uk-media-250 uk-position-relative">
                                <a href="{{url(geturl($_row->uri))}}">
                                     @if($_row->page_thumbnail != null)
                                      <img src="{{asset('uploads/original/' . $_row->page_thumbnail)}}"  class="uk-transition-scale-down uk-transition-opaque">
                                        @else
                                        <img src="{{asset('images/default.png')}}"  class="uk-transition-scale-down uk-transition-opaque">
                                        @endif
                                    
                                </a>
                            </div>
                            <div class="uk-card uk-card-default  uk-card-body">
                                <h1 class="uk-h4 uk-text-bold uk-margin-remove">
                                    <a href="{{url(geturl($_row->uri))}}">{{$_row->post_title}}</a>
                                </h1>
                                  <div class="uk-text-small uk-margin-small">
                                    {!! $_row->post_excerpt !!}
                                    <a href="{{url(geturl($_row->uri))}}">Read More
                                        <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                        @endforeach
                    @endif
                    @endif
                @endforeach
            </ul>
        </div>

    </section>
    <!-- end section -->
    <!-- section -->
    <section class="bg-primary-dark   uk-position-relative uk-overflow-hidden">
        <div class="uk-career-image">
            <div class="uk-concept uk-visible@m">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 190 150"  xml:space="preserve">
            <style type="text/css">
                .st0{fill:var(--bg-primary); opacity: 0.8;}
                .st1{fill:var(--bg-primary); opacity: 0.8;}
                .st2{fill:var(--bg-secondary); opacity: 0.8;}
                .st3{fill:var(--bg-primary-dark); opacity: 0.8;}
            </style>
                    <g>
                        <polygon class="st0" points="4.14,144 151,144 151,139 17.86,139 167,13.69 167,135.38 167,137 172,137 172,2.96 	"/>
                        <rect x="167" y="139" class="st1" width="5" height="5"/>
                        <rect x="160" y="139" class="st2" width="5" height="5"/>
                        <rect x="153" y="139" class="st3" width="5" height="5"/>
                    </g>
         </svg>
            </div>
            <img src="{{asset('uploads/original/' . $career->banner)}}" alt="">
        </div>
        <div class="uk-container uk-container-large">
            <div class="uk-grid-large  uk-flex-middle" uk-grid uk-scrollspy="cls: uk-animation-slide-top-small; target:div, h1, p, a;  delay: 20; repeat: false;">
                <div class="uk-width-1-2@m uk-width-1-1@s">
                    <div class="uk-section-large">
                        <h4 class="uk-text-uppercase  uk-text-bold  uk-margin-remove text-white">{{$career->post_title}}<span class="uk-margin-small-right text-white" uk-icon="icon:minus; ratio: 2;"></span></h4>
                        <h1 class="uk-h2 text-white uk-margin-large uk-text-bold">{!!$career->post_excerpt!!}</h1>
                        <a href="{{url(geturl($career->uri))}}" class="uk-button uk-button-white-outline">Discover More</a>
                    </div>
                </div>
                <div class="uk-width-1-2@m uk-width-1-1@s">
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- section -->
<section class="uk-section">
   <div class="uk-container uk-container-large">
      <div class="uk-grid-expand uk-grid-medium uk-grid-margin-medium"  uk-grid uk-scrollspy="cls: uk-animation-slide-top-small; target:div, h1, p, a;  delay: 20; repeat: false;">
         <div class="uk-width-1-2@l">
            <!-- slider -->
            <div class="uk-position-relative uk-visible-toggle " tabindex="-1" uk-slider="autoplay: true; finite: true; ">

    <ul class="uk-slider-items uk-child-width-1-1 uk-position-relative">
          @foreach($blog as $value)
        <li>
            <div class="  uk-margin uk-text-left uk-scrollspy-inview uk-animation-slide-bottom-medium"  style="">
               <a class="uk-container uk-inline-clip uk-transition-toggle uk-link-toggle"  tabindex="0" href="{{ url(post_parent($value->uri)->uri.'/'.geturl($value['uri'], $value['page_key'])) }}">
                  <canvas width="1080" height="800"></canvas>
                   @if($value->page_thumbnail)
                  <img class="uk-image uk-cover" alt="" uk-cover="" data-src="{{asset('uploads/original/' . $value->page_thumbnail)}}" uk-img="">
                  @else
                   <img class="uk-image uk-cover" alt="" uk-cover="" data-src="{{asset('images/default.png')}}" uk-img="">
                   @endif
                  <div class="uk-overlay-primary  uk-overlay uk-position-cover"></div>
                  <div class="uk-overlay uk-position-bottom-left uk-margin-remove-first-child">
                     <h3 class="text-white uk-text-bold uk-h3 uk-margin-remove-top uk-margin-small-bottom" >        
                      {{$value->post_title}}
                     </h3>
                     <!-- <p class="text-white uk-margin-small-bottom">Governor Mr. Maha Prasad Adhikari through theannual monetary policy</p> -->
                     <a href="#" class="uk-display-block"><span class="uk-badge bg-4 uk-margin-small">{{post_parent($value->uri)->post_title}}</span></a>
                  </div>
               </a>
            </div>
         </li>
@endforeach
          

          
      </ul>
         <!-- slider nav -->
        <!--   <div class=" uk-slidenav-container uk-position-top-right ">
           <a class="uk-slidenav uk-slidenav uk-icon uk-slidenav-previous uk-slidenav bg-1 " href="#" uk-slidenav-previous="" uk-slider-item="previous"> </a>
           <a class="uk-slidenav uk-slidenav uk-icon uk-slidenav-next uk-slidenav bg-1 " href="#" uk-slidenav-next="" uk-slider-item="next"> </a>
        </div> -->
       <!--    <a class="uk-position-center-left uk-position-xsmall uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-xsmall uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
 -->
 <div class="uk-position-bottom uk-margin-bottom uk-light">
     <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
 </div>
       

   </div>
            <!-- slider end -->

         </div>
               
                <div class="uk-width-1-2@l">
                    <div class="uk-margin uk-text-left uk-scrollspy-inview uk-animation-slide-bottom-medium" uk-scrollspy-class>
                        @foreach($news as $value)
                            @if($loop->iteration==1)
                        <a class="uk-container uk-inline-clip uk-transition-toggle uk-link-toggle" style="min-height: 200px" tabindex="0" href="{{ url(post_parent($value->uri)->uri.'/'.geturl($value['uri'], $value['page_key'])) }}">
                            <canvas width="1080" height="370"></canvas>
                             @if($value->page_thumbnail)
                            <img class="uk-image uk-cover" alt="" uk-cover="" data-src="{{asset('uploads/original/' . $value->page_thumbnail)}}"  uk-img="">
                            @else
                              <img class="uk-image uk-cover" alt="" uk-cover="" data-src="{{asset('images/default.png')}}"  uk-img="">
                              @endif
                            <div class="uk-overlay-primary  uk-overlay uk-position-cover"></div>
                            </a>
                            <div class="uk-overlay uk-position-bottom-left uk-margin-remove-first-child">
                                <h3 class="text-white uk-text-bold uk-h4 uk-margin-small-bottom">
                                    <a href="{{ url(post_parent($value->uri)->uri.'/'.geturl($value['uri'], $value['page_key'])) }}">
                                    {{$value->post_title}}</a>
                                </h3>
                                 <a href="#">  <span class="uk-badge bg-1 uk-margin-small">{{post_parent($value->uri)->post_title}}</span></a>
                            </div>
                        
                            @endif
                        @endforeach
                    </div>
                    <div class="uk-margin uk-text-left">
                        <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-grid-medium uk-grid" uk-grid="">
                            <div >
                                <div>
                                    @foreach($news as $value)
                                        @if($loop->iteration==2)
                                    <a class="uk-item uk-inline-clip uk-transition-toggle uk-link-toggle uk-scrollspy-inview uk-animation-slide-bottom-medium"  tabindex="0"
                                       href="{{ url(post_parent($value->uri)->uri.'/'.geturl($value['uri'], $value['page_key'])) }}" >
                                        <canvas width="650" height="500"></canvas>
                                    @if($value->page_thumbnail)
                                    <img class="uk-image uk-cover" alt="" uk-cover="" data-src="{{asset('uploads/original/' . $value->page_thumbnail)}}"  uk-img="">
                                    @else
                                      <img class="uk-image uk-cover" alt="" uk-cover="" data-src="{{asset('images/default.png')}}"  uk-img="">
                                      @endif
                                        <div class="uk-overlay-primary  uk-position-cover"></div>
                                        <div class="uk-overlay uk-width-medium uk-position-bottom-left uk-margin-remove-first-child">
                                            <h3 class="text-white uk-h4 uk-margin-small-bottom"> {{$value->post_title}}</h3>
                                             <a href="#">  <span class="uk-badge bg-2 uk-margin-small">{{post_parent($value->uri)->post_title}}</span></a>
                                        </div>
                                    </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <div>
                                    @foreach($news as $value)
                                        @if($loop->iteration==3)
                                    <a class="uk-item uk-inline-clip uk-transition-toggle uk-link-toggle uk-scrollspy-inview uk-animation-slide-bottom-medium" tabindex="0" href="{{ url(post_parent($value->uri)->uri.'/'.geturl($value['uri'], $value['page_key'])) }}" >
                                        <canvas width="650" height="500"></canvas>
                                        @if($value->page_thumbnail)
                            <img class="uk-image uk-cover" alt="" uk-cover="" data-src="{{asset('uploads/original/' . $value->page_thumbnail)}}"  uk-img="">
                            @else
                              <img class="uk-image uk-cover" alt="" uk-cover="" data-src="{{asset('images/default.png')}}"  uk-img="">
                              @endif
                                        <div class="uk-overlay-primary  uk-position-cover"></div>
                                        <div class="uk-overlay uk-width-medium uk-position-bottom-left uk-margin-remove-first-child">
                                            <h3 class="text-white uk-h4 uk-margin-small-bottom">{{$value->post_title}}</h3>
                                             <a href="#">  <span class="uk-badge bg-3 uk-margin-small">{{post_parent($value->uri)->post_title}}</span></a>
                                        </div>
                                    </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- end section -->

@endsection
@section('libraries')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.alert').hide(8000);
        });
    </script>
@endsection
