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
        <p class="lead"></p>
        <div class="header-pills">
            <a class="header-pill current-pill">About Us</a>
            @foreach ($posts as $row)
                <a href="{{ route('page.pagedetail', ['parent' => $data->uri, 'uri' => $row->uri]) }}"
                    class="header-pill ">{{ $row->post_title }}</a>
            @endforeach
        </div>
    </div>
</section>

<section class="section" id="story">
    <div class="wrap">
        <div class="about-grid">
            <div class="reveal">
                <span class="eyebrow on-light">{{ $data->post_type }}</span>

                <div class="about-copy" style="margin-top:24px;">
                    {!! $data->content !!}
                </div>
            </div>
            <div class="about-panel reveal">
                <div class="row"><span class="l">Founded</span><span class="n">{{ $setting->year }}</span></div>
                <div class="row"><span class="l">Team of professionals</span><span class="n">{{ $setting->field3 }}</span></div>
                <div class="row"><span class="l">Full-time Chartered Accountants</span><span class="n">{{ $setting->location2 }}</span></div>
                <div class="row"><span class="l">Global network </span><span class="n">{{ $setting->network }} Countries</span></div>
                <div class="row"><span class="l">Offices</span><span class="n">{{ $setting->office }}</span></div>
            </div>
        </div>
    </div>
</section>

<section class="career-banner">
    <div class="wrap">
        <h2>Take your career to the next level with NBSM.</h2>
        <a href="{{ url('page/' . posttype_url($contact->uri)) }}" class="btn btn-ghost">Explore careers <svg
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M13 6l6 6-6 6" />
            </svg></a>
    </div>
</section>

@stop
