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
        <div class="industry-grid reveal">
            @foreach ($posts as $row)
                <div class="industry-tile has-visual">
                    <div class="card-visual" style="height:150px;">
                        <img src="{{ asset('uploads/original/' . $row->page_thumbnail) }}" alt="{{ $row->post_title }}" style="width:100%; height:100%; object-fit:cover; display:block;">
                    </div>

                    <div class="card-body">
                        <span class="num">{{ $loop->iteration }}</span>
                        <h4 style="margin-top:14px;">{{ $row->post_title }}</h4>
                        <p style="margin-top:10px;font-size:13.5px;color:var(--slate);">
                            {!! $row->post_excerpt !!}
                        </p>
                        <a class="more" href="{{ route('page.pagedetail', ['parent' => $data->uri, 'uri' => $row->uri]) }}" style="margin-top:14px;display:inline-flex;align-items:center;gap:8px;font-size:13px;font-weight:700;color:var(--ink);">View
                            details <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
        <h2>Don&rsquo;t see your sector?</h2>
        <a href="{{ url('page/' . posttype_url($contact->uri)) }}" class="btn btn-ghost">Talk to us anyway <svg viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M13 6l6 6-6 6" />
            </svg></a>
    </div>
</section>
@stop
