@extends('themes.default.common.master')
@section('post_title',$data->post_title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('content')
    <!-- banner -->
   <section class="bg-primary-dark uk-position-relative uk-flex uk-flex-middle " uk-height-viewport="expand: true; min-height: 300;">
   <div class="uk-width-1-1 uk-position-z-index">
      <div class="uk-container uk-container-large uk-position-relative  uk-flex-middle uk-flex" uk-height-viewport="expand: true; min-height: 550;">
         <div class="  uk-width-1-1" uk-scrollspy="cls: uk-animation-slide-top-small; target:h1, p, a;  delay: 100; repeat: false;">
            <h1 class="uk-text-bold text-white uk-margin-small">{{$data->post_type}}</h1>
            <!--<p class="text-white">To help us direct your enquiry, please complete the form below with your details and your reason for contacting us.</p>-->
         </div>
      </div>
   </div>
   </div>
   </div>
   </div>
</section>
    <!-- end banner -->
    <!-- section -->
    <section class="uk-section">
        <div class="uk-container uk-container-large">
            <form method="post" action="{{route('contact-form')}}">
                @csrf
                 <input type="hidden" id="g_recaptcha_response" name="g_recaptcha_response" />
                <div uk-grid>
                    <div class="uk-width-expand@m">
                        <div  class="uk-grid-medium" uk-grid>
                            <!--  -->
                            <div class="uk-width-1-4">
                                <label for="title">Title <em>*</em></label>
                                <select class="uk-select" name="" id="title">
                                    <option disabled selected>Select</option>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Ms">Ms</option>
                                    <option value="Miss">Miss</option>
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
                                <label for="jobtitle">Job Title</label>
                                <input class="uk-input" name="job_title" id="jobtitle" type="text" placeholder="">
                            </div>
                            <!--  -->
                            <!--  -->
                            <div class="uk-width-1-2@s">
                                <label for="companyname">Company Name</label>
                                <input class="uk-input" name="company" id="companyname" type="text" placeholder="">
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
                                <label for="address">Address</label>
                                <input class="uk-input" name="address" id="address" type="text" placeholder="">
                            </div>
                            <!--  -->
                            <!--  -->
                            <div class="uk-width-1-2@s">
                                <label for="town">Town</label>
                                <input class="uk-input" name="town" id="town" type="text" placeholder="">
                            </div>
                            <!--  -->
                            <!--  -->
                            <div class="uk-width-1-1"></div>
                            <!--  -->
                            <div class="uk-width-1-2@s">
                                <label for="Postcode">Postcode</label>
                                <input class="uk-input" name="post_code" id="Postcode" type="text" placeholder="">
                            </div>
                            <!--  -->
                            <!--  -->
                            <div class="uk-width-1-2@s">
                                <label for="Country">Country <em>*</em></label>
                                <select class="uk-select" name="country" id="Country">
                                    <option disabled>Select</option>
                                     @foreach($country as $value)
                                         <option value="{{$value->country}}">{{$value->country}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--  -->
                            <!--  -->
                            <div class="uk-width-1-1@s">
                                <label for="Comments">Comments</label>
                                <textarea class="uk-textarea" name="comments" id="Comments"  rows="5"></textarea>
                            </div>
                            <!--  -->
                            <div class="uk-width-1-1">
                                <button class="uk-button uk-button-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-1-3@m">
                        <!-- facebook -->
                        <div class="uk-margin">
                            <div id="fb-root"></div>
                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0" nonce="Odv1hw0l"></script>
                            <div class="fb-page" data-href="https://www.facebook.com/nbsm.global/" data-tabs="timeline" data-width="" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/nbsm.global/" class="fb-xfbml-parse-ignore"><a href="{{$setting->facebook_link}}">NBSM</a></blockquote></div>
                        </div>
                        <!-- end facebook -->


                        <!-- twitter -->
                        <div class="uk-margin">
                            <a class="twitter-timeline" data-width="340" data-height="350" data-theme="light" href="https://twitter.com/nbsmnepal?ref_src=twsrc%5Etfw">Tweets by nbsmnepal</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                        <!-- end twitter -->
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- end section -->
    <!-- section -->
    @if($branches->count()>0)
    <section class="bg-primary uk-contact-details">
        <div class="uk-container uk-container-large">
            <div class="uk-child-width-expand@s" uk-grid>
                <!--  -->
             @foreach($branches as $value)
                <div>
                    <div class="uk-padding">
                        <h1 class="uk-h4 uk-text-bold text-white">{{$value->title}}</h1>
                        <ul class="uk-list-varticle ">
                            <li class="uk-flex text-white"><i class="fa fa-map-marker uk-margin-small-right uk-text-large"></i> {{$value->sub_title}} </li>
                            <li class="uk-flex text-white"><i class="fa fa-phone uk-margin-small-right uk-text-large"></i>{{$value->phone}}</li>
                            <li class="uk-flex text-white"><i class="fa fa-envelope uk-margin-small-right uk-text-large"></i> {{$value->email}}</li>
                        </ul>
                    </div>
                </div>
              @endforeach

            </div>
        </div>
    </section>
    @endif
    <!-- end section -->
    <!-- section -->
    <section>
     {!! $setting->google_map2 !!}
    </section>
    <!-- section end -->
    <script src="https://www.google.com/recaptcha/api.js?render={{env('SITE_KEY')}}"></script>
<script>
grecaptcha.ready(function() {
    grecaptcha.execute('{{env("SITE_KEY")}}', {action: 'homepage'}).then(function(token) {
       document.getElementById('g_recaptcha_response').value=token;
    });
});
</script>
@endsection
