<!doctype html>
<html lang="en">

<head>
    <title>{{ $setting->site_name }} @yield('trip_title')</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="google-site-verification" content="" />
    <meta name="keywords" content="@yield('meta_keyword')" />
    <meta name="description" content="@yield('meta_description')" />

    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ $setting->site_name }}" />
    <meta property="og:description" content="@yield('meta_description')" />
    @if (trim($__env->yieldContent('thumbnail')))
        <meta property="og:image" content="{{ asset(env('PUBLIC_PATH') . 'uploads/original/') }}/@yield('thumbnail')" />
    @else
        <meta property="og:image" content="{{ asset(env('PUBLIC_PATH')) }}/images/logo.png" />
    @endif
    <meta property="og:image:width" content="1000" />
    <meta property="og:image:height" content="600" />

    <meta name="twitter:image" content="{{ asset(env('PUBLIC_PATH') . 'uploads/original/') }}/@yield('thumbnail')" />
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('meta_description')">
    <meta name="twitter:card" content="summary_large_image" />

    <!-- favicon -->
    <link rel="icon" href="{{ asset('themes-assets/images/favicon.png') }}" type="image/png">
    <meta name="theme-color" content="#0e5d97">
    <!-- end favicon -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700;800&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('themes-assets/assets/styles.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    @include('themes.default.common.response')

    <div class="utility-bar" id="utility-bar">
        <div class="wrap">
            <div class="utility-left">
                <a class=""
                    href="{{ url('page/' . posttype_url($about->uri)) }}">{{ ucfirst(strtolower($about->post_type)) }}</a>
                <a class=""
                    href="{{ url('page/' . posttype_url($global->uri)) }}">{{ ucfirst(strtolower($global->post_type)) }}</a>
            </div>
            <div class="utility-right">
                <a href="{{ url('page/' . posttype_url($nepal->uri)) }}">{{ $nepal->post_type }}</a>
                <span class="divider"></span>
                <a
                    href="{{ route('page.pagedetail', ['parent' => $about->uri, 'uri' => $career->uri]) }}">{{ $career->post_title }}</a>
            </div>
        </div>
    </div>

    <header id="site-header">
        <div class="wrap">
            <a href="{{ url('/') }}" class="logo-wrap">
                <img class="logo-mark logo-mark-dark" src="{{ asset('themes-assets/assets/img/logo-ondark.png') }}"
                    alt="NBSM &amp; Associates" style="display: none" />
                <img class="logo-mark logo-mark-light" src="{{ asset('themes-assets/assets/img/logo.png') }}"
                    alt="NBSM &amp; Associates" />
            </a>

            <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation" aria-expanded="false" aria-controls="mainNav">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="nav-overlay" id="navOverlay"></div>

            <div class="nav-group" id="mainNav">
                <nav>
                    @foreach ($navigations as $row)
                        <a class="nav-link featured"
                            href="{{ url('page/' . posttype_url($row->uri)) }}">{{ $row->post_type }}</a>
                    @endforeach
                </nav>
                <div class="header-cta">
                    <a href="{{ url('page/' . posttype_url($contact->uri)) }}" class="btn btn-cyan">Request a Proposal
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg></a>
                </div>
            </div>
        </div>
    </header>
    <div id="top"></div>

