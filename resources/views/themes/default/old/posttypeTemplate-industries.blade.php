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
            <div class="industry-grid reveal">
                @foreach ($posts as $row)
                    <a href="{{ route('page.pagedetail',['parent' => $data->uri,'uri' => $row->uri]) }}">
                        <div class="industry-tile" style="min-height:170px;">

                            <div style="display:flex; align-items:baseline; gap:15px;">
                                <span class="num">{{ sprintf('%02d', $loop->iteration) }}</span>

                                <h4 style="margin:0;">
                                    {{ $row->post_title }}
                                </h4>
                            </div>

                            <p style="margin-top:10px;font-size:13.5px;color:var(--slate);">
                                {!! $row->post_excerpt !!}
                            </p>

                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="career-banner">
        <div class="wrap">
            <h2>Don&rsquo;t see your sector?</h2>
            <a href="{{ url('page/' . posttype_url($contact->uri)) }}" class="btn btn-ghost">Talk to us anyway <svg
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M13 6l6 6-6 6" />
                </svg></a>
        </div>
    </section>

@stop
