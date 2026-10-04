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
            @foreach ($posts as $row)
                <div class="detail-block" >
                    <div class="detail-grid reveal">
                        <div>
                            <div class="tag-num">{{ sprintf('%02d', $loop->iteration) }}</div>
                            <h2 style="font-size:22px;">{{ $row->post_title }}</h2>
                        </div>
                        <div>
                            <p style="font-size:13.5px;color:var(--cyan);font-weight:700;text-transform:uppercase;letter-spacing:.04em;">
                                {{ $row->sub_title }}
                            </p>
                            <p style="margin-top:14px;font-size:15px;color:var(--slate);">
                                {!! $row->post_excerpt !!}
                            </p>
                            <p style="margin-top:14px;font-size:15px;color:var(--slate);">
                                {!! $row->post_content !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="nepal-cta reveal">
                <p>Considering Nepal? Talk to NBSM.</p>
                <a href="{{ url('page/' . posttype_url($contact->uri)) }}" class="btn btn-cyan">Start the conversation <svg viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M13 6l6 6-6 6" />
                    </svg></a>
            </div>
        </div>
    </section>

@stop
