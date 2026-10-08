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
        <div class="lead lead-new">{!! $data->content !!}</div>
    </div>
</section>
@php
    $serviceIcons = [
        '<svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
            <path d="M12 3l8 4v5c0 5-3.5 8.5-8 9-4.5-.5-8-4-8-9V7z"/>
            <path d="M9 12l2 2 4-4"/>
        </svg>',

        '<svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
            <path d="M9 3v4M15 3v4M4 8h16M6 8v11a2 2 0 002 2h8a2 2 0 002-2V8M9 13h6M9 17h4"/>
        </svg>',

        '<svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
            <path d="M12 2l3 6 6 1-4.5 4.5L18 20l-6-3-6 3 1.5-6.5L3 9l6-1z"/>
        </svg>',

        '<svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
            <circle cx="12" cy="12" r="9"/>
            <path d="M12 7v5l3 3"/>
        </svg>',

        '<svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
            <rect x="3" y="4" width="18" height="14" rx="1.5"/>
            <path d="M8 21h8M12 18v3"/>
        </svg>',
    ];
@endphp

<section class="section" style="padding-bottom:40px;">
    <div class="wrap">
        <div class="services-grid reveal">
            @foreach ($posts as $row)
                @php
                    $randomIcon = $serviceIcons[array_rand($serviceIcons)];
                @endphp
                <div class="service-card has-visual">
                    <div class="card-visual" style="height:150px;">
                        <img src="{{ asset('uploads/original/' . $row->page_thumbnail) }}" alt="{{ $row->post_title }}"
                            style="width:100%; height:100%; object-fit:cover; display:block;">
                    </div>
                    <div class="card-body">
                        <div class="icon-badge">
                            {!! $randomIcon !!}
                        </div>
                        <h3 style="">{{ $row->post_title }}</h3>
                        <p>{!! $row->post_excerpt !!}</p>

                        <a class="more"
                            href="{{ route('page.pagedetail', ['parent' => $data->uri, 'uri' => $row->uri]) }}">View details
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M13 6l6 6-6 6" />
                            </svg></a>
                    </div>
                </div>
            @endforeach
        </div>
        {!! $posts->links('themes.default.common.pagination') !!}
    </div>
</section>

<section class="career-banner">
    <div class="wrap">
        <h2>Not sure which service you need?</h2>
        <a href="{{ url('page/' . posttype_url($contact->uri)) }}" class="btn btn-ghost">Talk to an expert <svg
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M13 6l6 6-6 6" />
            </svg></a>
    </div>
</section>

@stop
