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

    @if($data_child->count() > 0)
        <section class="section bg-paper" id="sd-children">
            <div class="wrap">
                <div class="section-head reveal">
                    <span class="eyebrow on-light">Under this resource</span>
                    <h2>We have</h2>
                </div>

                <div class="sd-children-grid reveal">
                    @foreach($data_child as $child)
                        <a class="sd-child-card" href="{{ route('page.pagedetail',['parent' => $pos_type->uri,'uri' => $child->uri]) }}">
                            <div class="sd-child-thumb"><img src="{{ $child->page_thumbnail ? asset('uploads/medium/'.$child->page_thumbnail) : asset('assets/img/ese.png') }}" /></div>
                            <div class="sd-child-body">
                                <span class="tag">{{ $data->post_title }}</span>
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

                {!! $data_child->links('themes.default.common.pagination') !!}
            </div>
        </section>
    @endif

@endsection
