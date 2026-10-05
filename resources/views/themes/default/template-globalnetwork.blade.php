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
        <p class="lead">{!! $data->post_excerpt !!}</p>

        <div class="header-pills">
            @foreach ($related as $row)
                <a href="{{ route('page.pagedetail', ['parent' => $pos_type->uri, 'uri' => $row->uri]) }}"
                    class="header-pill {{ request()->route('uri') == $row->uri ? 'current-pill' : '' }}">{{ $row->post_title }}</a>
            @endforeach
        </div>
    </div>
</section>

<section class="section">
    <div class="wrap">
        <p style="max-width:760px;color:var(--slate);font-size:16px;">NBSM is an independent firm in Nepal, in
            association with Moore Global Limited, with members in principal cities throughout the world.</p>
        <div class="moore-stat-grid reveal" style="margin-top:40px;">
            <div class="moore-stat-card">
                <svg class="moore-stat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                    <path d="M17 21v-2a4 4 0 00-4-4H7a4 4 0 00-4 4v2" />
                    <circle cx="10" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 00-3-3.87" />
                    <path d="M16 3.13a4 4 0 010 7.75" />
                </svg>
                <div class="n">30,000+</div>
                <div class="l">People across the Moore Global network</div>
            </div>
            <div class="moore-stat-card">
                <svg class="moore-stat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                    <rect x="3" y="7" width="18" height="14" rx="2" />
                    <path d="M16 7V5a4 4 0 00-8 0v2" />
                </svg>
                <div class="n">260+</div>
                <div class="l">Independent member firms</div>
            </div>
            <div class="moore-stat-card">
                <svg class="moore-stat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M2 12h20M12 2a15 15 0 010 20 15 15 0 010-20z" />
                </svg>
                <div class="n">110</div>
                <div class="l">Countries served</div>
            </div>
            <div class="moore-stat-card">
                <svg class="moore-stat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                    <path d="M12 2l3 6 6 1-4.5 4.5L18 20l-6-3-6 3 1.5-6.5L3 9l6-1z" />
                </svg>
                <div class="n">2009</div>
                <div class="l">Independent member firm since inception</div>
            </div>
        </div>
        <div class="reveal" style="margin-top:40px;display:flex;align-items:center;gap:20px;flex-wrap:wrap;">
            <img src="{{asset('themes-assets/assets/img/moore-logo.png')}}" alt="{{ $data->post_title }}" style="height:30px;">
            <span style="font-size:13.5px;color:var(--slate-2);">Member since inception &middot; one of the
                world&rsquo;s top ten largest accounting networks</span>
        </div>
        <div class="section-head reveal" style="margin-top:70px;max-width:600px;">
            <span class="eyebrow on-light">Why work with Moore</span>
        </div>

        <div class="moore-why-grid reveal">
            @foreach($data_child as $child)
                <div class="moore-why-card">
                    <span class="idx">{{$loop->iteration}}</span>
                    <h4>{{ $child->post_title }}</h4>
                    <p>{!! $child->post_excerpt !!}</p>
                </div>
            @endforeach
        </div>
        {!! $data_child->links('themes.default.common.pagination') !!}
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
