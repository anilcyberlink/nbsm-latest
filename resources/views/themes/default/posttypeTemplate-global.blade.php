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
        <p class="lead">{!! $data->content !!}</p>
    </div>
</section>

<section class="section">
    <div class="wrap">
        <div class="services-grid reveal">
            @foreach ($posts as $row)
                <div class="service-card">
                    <h3>{{ $row->post_title }}</h3>
                    <p>{!! $row->post_excerpt !!}</p>
                    <a class="more" href="{{ route('page.pagedetail', ['parent' => $data->uri, 'uri' => $row->uri]) }}">View details <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg></a>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="career-banner">
    <div class="wrap">
        <h2>Considering Nepal for outsourcing or investment?</h2>
        <a href="{{ url('page/' . posttype_url($contact->uri)) }}" class="btn btn-ghost">See the Nepal microsite <svg
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M13 6l6 6-6 6" />
            </svg></a>
    </div>
</section>
@stop
