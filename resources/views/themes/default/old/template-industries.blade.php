@extends('themes.default.common.master')
@section('title', $data->post_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->page_thumbnail)
@section('content')

    <section class="page-header">
        <div class="ascent-strip" id="ascent-strip" aria-hidden="true"></div>
        <div class="wrap">
            <div class="ph-grid">
                <div>
                    <div class="breadcrumb"><a href="{{ url('/') }}">Home</a> &nbsp;/&nbsp; <span>{{ $pos_type->post_type }}</span></div>
                    <span class="eyebrow hero-eyebrow" style="color:var(--cyan)">{{ $data->post_title }}</span>

                    <h1 style="margin-top:16px;">{{ $data->sub_title }}</h1>
                    <div class="lead">{!! $data->post_excerpt !!}</div>
                </div>

                <div class="ph-thumb">
                    <img src="{{ $data->page_thumbnail ? asset('uploads/medium/'.$data->page_thumbnail) : asset('assets/img/ese.png') }}" alt="{{ $data->post_title }}" />
                </div>
            </div>
        </div>
    </section>

    <div class="detail-block" id="overview">
        <div class="wrap">
            <div class="sd-body-grid reveal">
                <div class="detail-grid" style="grid-template-columns:1fr;">
                    <div>
                        <p style="font-size:16px;color:var(--slate);margin-top:14px;">
                            {!! $data->post_content !!}
                        </p>
                    </div>
                </div>

                <aside class="sd-side">
                    <div class="sd-contact-card">
                        <span class="lbl">Other Industries</span>
                        <div class="related-list">
                            @foreach ($related as $row)
                                <a href="{{ route('page.pagedetail',['parent' => $pos_type->uri,'uri' => $row->uri]) }}">{{ $row->post_title }}
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6" /></svg>
                                </a>
                            @endforeach
                        </div>
                        <a href="{{ url('page/' . posttype_url($contact->uri)) }}" class="btn btn-cyan" style="margin-top:18px;">Talk to an expert
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6" /></svg></a>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    @if($data_child->count() > 0)
        <section class="section bg-paper" id="sd-children">
            <div class="wrap">
                <div class="section-head reveal">
                    <span class="eyebrow on-light">Under this service</span>
                    <h2>How we can help</h2>
                </div>

                <div class="sd-children-grid reveal">
                    @foreach($data_child as $child)
                        <a class="sd-child-card" href="{{ route('page.pagedetail',['parent' => $pos_type->uri,'uri' => $child->uri]) }}">
                            <div class="sd-child-thumb"><img src="{{ $data->page_thumbnail ? asset('uploads/medium/'.$data->page_thumbnail) : asset('assets/img/ese.png') }}" /></div>
                            <div class="sd-child-body">
                                <span class="tag">Sub-service</span>
                                <h3>{{ $child->post_title }}</h3>
                                <p>{{ $child->sub_title }}</p>
                                <span class="more" >Read more
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M5 12h14M13 6l6 6-6 6" />
                                    </svg>
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
