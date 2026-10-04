@extends('themes.default.common.master')
@section('content')

    <!-- banner -->
    <section class="bg-primary-dark uk-position-relative uk-flex uk-flex-middle "
             uk-height-viewport="expand: true; min-height: 300;">
        <div class="uk-width-1-1 uk-position-z-index">
            <div class="uk-container uk-container-large uk-position-relative  uk-flex-middle uk-flex"
                 uk-height-viewport="expand: true; min-height: 550;">
                <div class="  uk-width-1-1"
                     uk-scrollspy="cls: uk-animation-slide-top-small; target:h1, p, a;  delay: 100; repeat: false;">
                    <h1 class="uk-text-bold text-white uk-margin-small">{{$data->post_type}}</h1>
                    <p class="text-white">{{$data->caption}}</p>
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
            <form method="post" action="{{route('proposal-request',$data)}}" enctype="multipart/form-data">
{{--                <input type="hidden" name="uri" value="{{$data}}">--}}
                @csrf
                <div uk-grid>
                    <div class="uk-width-expand@m">
                        <div class="uk-grid-medium" uk-grid>
                            <!--  -->
                            <div class="uk-width-1-4">
                                <label for="title">Title <em>*</em></label>
                                <select class="uk-select" name="" id="title">
                                    <option disabled selected>Select</option>
                                    <option value="Dr">Dr</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                                    <option value="Prof.">Prof.</option>
                                </select>
                            </div>
                            <!--  -->
                            <div class="uk-width-1-1"></div>
                            <!--  -->
                            <div class="uk-width-1-2@s">
                                <label for="firstname">First Name <em>*</em></label>
                                <input class="uk-input" name="firstname" id="firstname" type="text" placeholder="">
                            </div>
                            <!--  -->
                            <!--  -->
                            <div class="uk-width-1-2@s">
                                <label for="lastname">Last Name <em>*</em></label>
                                <input class="uk-input" name="lastname" id="lastname" type="text" placeholder="">
                            </div>
                            <!--  -->
                            <!--  -->
                            <div class="uk-width-1-1"></div>
                            <!--  -->
                            <div class="uk-width-1-2@s">
                                <label for="email">Email <em>*</em></label>
                                <input class="uk-input" name="email" id="email" type="email" placeholder="">
                            </div>
                            <!--  -->
                            <!--  -->
                            <div class="uk-width-1-2@s">
                                <label for="contactname">Contact Number <em>*</em></label>
                                <input class="uk-input" name="phone" id="contactname" type="text" placeholder="">
                            </div>
                            <!--  -->

                            <!--  -->
                            <div class="uk-width-1-1"></div>
                            <!--  -->
                            <div class="uk-width-1-2@s">
                                <label for="jobtitle">Position/Job Title</label>
                                <input class="uk-input" name="position" id="jobtitle" type="text" placeholder="">
                            </div>
                            <!--  -->
                            <!--  -->
                            <div class="uk-width-1-2@s">
                                <label for="companyname">Company/Organisation Name</label>
                                <input class="uk-input" name="company" id="companyname" type="text" placeholder="">
                            </div>
                            <!--  -->

                            <!--  -->
                            <div class="uk-width-1-2@s">
                                <label for="Postcode">Postcode</label>
                                <input class="uk-input" name="postcode" id="Postcode" type="text" placeholder="">
                            </div>
                            <!--  -->
                            <!--  -->
                            <div class="uk-width-1-2@s">
                                <label for="Country">Country Selector <em>*</em></label>
                                <select class="uk-select" name="country" id="Country">
                                    <option disabled selected>Select</option>
                                    @foreach($country as $val)
                                      <option value="{{$val->country}}">{{$val->country}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--  -->
                            <!--  -->
                            <div class="uk-width-1-2">
                                <label for="Industry">Industry <em>*</em></label>
                                <select class="uk-select" name="industry" id="Industry">
                                    @foreach($industry as $row)
                                        <option value="{{$row->uri}}" {{ ($row->uri == $value )?'selected':'' }}> {{$row->post_title}}</option>
                                    @endforeach


                                </select>
                            </div>
                            <!--  -->

                            <!--  -->
                            <div class="uk-width-1-2">
                                <label for="revenue">Select yearly revenue <small>(Revenue in USD)</small></label>
                                <select class="uk-select" name="revenue" id="revenue">
                                    <option disabled selected>Select</option>
                                    <option value="<$1m">&lt;$1m</option>
                                    <option value="$1m - 20m">$1m - 20m</option>
                                    <option value="$20m - $50m">$20m - $50m</option>
                                    <option value="$50m - $200m">$50m - $200m</option>
                                    <option value="$200m - $500m">$200m - $500m</option>
                                    <option value=">$500m">&gt;$500m</option>
                                    <option value="Prefer not to say">Prefer not to say</option>
                                </select>
                            </div>
                            <!--  -->

                            <!--  -->
                            <div class="uk-width-1-2">
                                <label for="continent">Do you have operations in more than one continent? : </label>
                                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid" id="continent">
                                    <label><input class="uk-radio" type="radio" name="option" value="yes"> Yes</label>
                                    <label><input class="uk-radio" type="radio" name="option" value="no"> No</label>
                                </div>
                            </div>
                            <!--  -->

                            <!--  -->
                            <div class="uk-width-1-2">
                                <label for="revenue">RFP </label>
                                <input type="file" name="rfp" class="uk-input">
                            </div>
                            <!--  -->


                            <!--  -->
                            <div class="uk-width-1-1@s">
                                <label for="Comments">Additional Comments</label>
                                <textarea class="uk-textarea" name="comment" id="Comments" rows="5"></textarea>
                            </div>
                            <!--  -->
{{--                            <!--  -->--}}
{{--                            <div class="uk-width-1-2">--}}
{{--                                <label for="continent">Do you have operations in more than one continent? : </label>--}}
{{--                                <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid" id="continent">--}}
{{--                                    <label><input class="uk-radio" type="radio" name="radio2" checked> Yes</label>--}}
{{--                                    <label><input class="uk-radio" type="radio" name="radio2"> No</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--  -->--}}


                            <div class="uk-width-1-1">
                                <button class="uk-button uk-button-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-1-3@m">
                        <!-- facebook -->
                        <div class="uk-margin">
                            <div id="fb-root"></div>
                            <script async defer crossorigin="anonymous"
                                    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0"
                                    nonce="Odv1hw0l"></script>
                            <div class="fb-page" data-href="https://www.facebook.com/nbsm.global/" data-tabs="timeline"
                                 data-width="" data-height="350" data-small-header="false"
                                 data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                <blockquote cite="https://www.facebook.com/nbsm.global/" class="fb-xfbml-parse-ignore">
                                    <a href="{{$setting->facebook_link}}">NBSM</a></blockquote>
                            </div>
                        </div>
                        <!-- end facebook -->


                        <!-- twitter -->
                        <div class="uk-margin">
                            <a class="twitter-timeline" data-width="340" data-height="350" data-theme="light"
                               href="{{$setting->twitter_link}}">Tweets by nbsmnepal</a>
                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                        <!-- end twitter -->
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- end section -->

@stop
