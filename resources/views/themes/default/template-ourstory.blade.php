@extends('themes.default.common.master')
@section('title', $data->post_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->page_thumbnail)
@section('content')

<section class="page-header">
    <div class="ascent-strip" id="ascent-strip" aria-hidden="true"></div>
    <div class="wrap">
        <div class="breadcrumb">
            <a href="{{ url('/') }}">HOME</a> &nbsp;/&nbsp; <a
                href="{{ url('page/' . posttype_url($pos_type->uri)) }}">{{ $pos_type->post_type }}</a>
            &nbsp;/&nbsp; <span>{{ $data->post_title }}</span>
        </div>
        <span class="eyebrow hero-eyebrow" style="color:var(--cyan)">{{ $data->sub_title }}</span>
        <h1 style="margin-top:16px;">{{ $data->post_title }}</h1>
        <div class="lead lead-new">{!! $data->post_excerpt !!}</div>

        <div class="header-pills">
            @foreach ($related as $row)
                <a href="{{ route('page.pagedetail', ['parent' => $pos_type->uri, 'uri' => $row->uri]) }}"
                    class="header-pill {{ request()->route('uri') == $row->uri ? 'current-pill' : '' }}">{{ $row->post_title }}</a>
            @endforeach
        </div>
    </div>
</section>

<section class="section" id="story">
    <div class="wrap">
        <div class="about-grid">
            <div class="reveal">
                <span class="eyebrow on-light">{{ $data->post_title }}</span>

                <div class="about-copy" style="margin-top:24px;">
                    {!! $data->post_excerpt !!}
                </div>
                <div class="about-copy" style="margin-top:24px;">
                    {!! $data->post_content !!}
                </div>
            </div>
            <div class="about-panel reveal">
                <div class="row"><span class="l">Founded</span><span class="n">{{ $setting->year }}</span></div>
                <div class="row"><span class="l">Team of professionals</span><span
                        class="n">{{ $setting->field3 }}</span></div>
                <div class="row"><span class="l">Full-time Chartered Accountants</span><span
                        class="n">{{ $setting->location2 }}</span></div>
                <div class="row"><span class="l">Global network </span><span class="n">{{ $setting->network }}
                        Countries</span></div>
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
