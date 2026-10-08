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
                <a href="{{ url('/') }}">HOME</a> &nbsp;/&nbsp; <a href="{{ url('page/' . posttype_url($pos_type->uri)) }}">{{ $pos_type->post_type }}</a>
                &nbsp;/&nbsp; <span>{{ $data->post_title }}</span>
            </div>
            <span class="eyebrow hero-eyebrow" style="color:var(--cyan)">{{ $data->sub_title }}</span>
            <h1 style="margin-top:16px;">{{ $data->post_title }}</h1>
            <div class="lead lead-new">{!! $data->post_excerpt !!}</div>

            <div class="header-pills">
                @foreach ($related as $row)
                    <a href="{{ route('page.pagedetail',['parent' => $pos_type->uri,'uri' => $row->uri]) }}" class="header-pill {{ request()->route('uri') == $row->uri ? 'current-pill' : '' }}">{{ $row->post_title }}</a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section">
        <div class="wrap">
            <div class="res-panel reveal">
                @foreach($data_child as $child)
                    <div class="res-item reveal" id="nepal-budget-2083-84">
                        <div class="card-visual" style="height:110px; overflow:hidden;">
                            <img
                                src="{{ $child->page_thumbnail ? asset('uploads/medium/'.$child->page_thumbnail) : asset('assets/img/ese.png') }}"
                                alt="{{ $child->post_title }}"
                                style="width:100%; height:100%; object-fit:cover; display:block;"
                            >
                        </div>
                        <div class="card-body res-item-body">
                            <span class="res-tag">{{ $data->post_title }}</span>
                            <h3 class="res-title">{{ $child->post_title }}</h3>
                            <p class="res-date">{{ \Carbon\Carbon::parse($row->created_at)->format('d F Y') }}</p>
                            <p class="res-excerpt">{{ $child->sub_title }}</p>
                            <span class="res-readmore">Read more <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M5 12h14M13 6l6 6-6 6" />
                                </svg></span>
                        </div>
                    </div>
                @endforeach
            </div>
            {!! $data_child->links('themes.default.common.pagination') !!}
        </div>
    </section>
    <section class="career-banner">
        <div class="wrap">
            <h2>Want sector-specific insight for your business?</h2>
            <a href="{{ url('page/' . posttype_url($contact->uri)) }}" class="btn btn-ghost">Talk to us <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M13 6l6 6-6 6" />
                </svg></a>
        </div>
    </section>


@endsection
