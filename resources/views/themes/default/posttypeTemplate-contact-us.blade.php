@extends('themes.default.common.master')
@section('post_title', $data->post_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')

    <section class="page-header">
        <div class="ascent-strip" id="ascent-strip" aria-hidden="true"></div>
        <div class="wrap">
            <div class="breadcrumb"><a href="{{ url('/') }}">Home</a> &nbsp;/&nbsp; <span>{{ $data->post_type }}</span>
            </div>
            <span class="eyebrow hero-eyebrow" style="color:var(--cyan)">{{ $data->uid }}</span>
            <h1 style="margin-top:16px;">{{ $data->caption }}</h1>
            <div class="lead">{!! $data->content !!}</div>
        </div>
    </section>
    <section class="section">
        <div class="wrap">
            <div class="contact-grid">
                <div class="reveal">
                    <div class="office">
                        <span class="label">Head Office &mdash; </span>
                        <h4>{{ $setting->location1 }}</h4>
                        <p>{{ $setting->address2 }}</p>
                        <p>{{ $setting->phone }} &middot; {{ $setting->email_primary }}</p>
                    </div>
                    <div class="office">
                        <span class="label">Branch Office &mdash; </span>
                        <h4>{{ $setting->location_link }}</h4>
                        <p>{{ $setting->field2 }}</p>
                        <p>{{ $setting->website2 }} &middot; {{ $setting->field1 }}</p>
                    </div>
                    <div class="office">
                        <span class="label">Careers</span>
                        <h4>Join NBSM</h4>
                        <p>{{ $setting->email_secondary }}</p>
                    </div>
                </div>
                <form action="{{ route('contact-form') }}" class="cform reveal" method="POST">
                    @csrf

                    <input type="hidden" id="g_recaptcha_response" name="g_recaptcha_response">

                    <div class="two">
                        <div>
                            <label>First name *</label>
                            <input type="text" name="fname" value="{{ old('fname') }}" required>
                        </div>

                        <div>
                            <label>Last name *</label>
                            <input type="text" name="lname" value="{{ old('lname') }}" required>
                        </div>
                    </div>

                    <div class="two">
                        <div>
                            <label>Email *</label>
                            <input type="email" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div>
                            <label>Contact number *</label>
                            <input type="tel" name="contact" value="{{ old('contact') }}" required>
                        </div>
                    </div>

                    <div>
                        <label>Company name</label>
                        <input type="text" name="cname" value="{{ old('cname') }}">
                    </div>

                    <div>
                        <label>How can we help?</label>
                        <textarea rows="4" name="message">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" style="align-self:flex-start;">
                        Submit enquiry
                    </button>
                </form>
            </div>
        </div>
        @if(!empty($setting->google_map2))
            <div class="wrap contact-map">
                <div class="map-wrapper">
                    {!! $setting->google_map2 !!}
                </div>
            </div>
        @endif
    </section>

    <script src="https://www.google.com/recaptcha/api.js?render={{ env('SITE_KEY') }}"></script>

    <script>
        grecaptcha.ready(function () {
            function executeRecaptcha() {
                grecaptcha.execute('<?php echo env("SITE_KEY"); ?>', {action: 'homepage'}).then(function (token) {
                    document.getElementById('g_recaptcha_response').value = token;
                });
            }

            // Initial execution of reCAPTCHA
            executeRecaptcha();

            // Refresh the reCAPTCHA token every 100 seconds (less than 2 minutes)
            setInterval(executeRecaptcha, 900000);
        });
    </script>
@endsection
