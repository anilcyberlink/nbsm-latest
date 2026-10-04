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
                <a href="{{ url('/') }}">Home</a>
                &nbsp;/&nbsp;
                <span>{{ $data->post_title }}</span>
            </div>
            <span class="eyebrow hero-eyebrow" style="color:var(--cyan)">
                {{ $data->post_title }}
            </span>
            <h1>
                {{ $data->sub_title }}
            </h1>
            <div class="lead">
                {!! $data->post_excerpt !!}
            </div>
        </div>
    </section>

    @if ($data_child->count())
        <section class="section career-intro">
            <div class="wrap">
                <div class="career-intro-card reveal in">
                    <span class="eyebrow on-light">
                        {{ $data->post_title }}
                    </span>
                    @if ($data->sub_title)
                        <h2>
                            {{ $data->sub_title }}
                        </h2>
                    @endif
                    <div class="career-intro-content">
                        {!! $data->post_content !!}
                    </div>

                    {{-- Vacancy / Job Categories --}}
                    <div class="career-accordion">
                        <ul uk-accordion>
                            @foreach ($data_child as $val)
                                <li>
                                    <span class="uk-accordion-title">
                                        {{ $val->post_title }}
                                    </span>
                                    <div class="uk-accordion-content">
                                        {!! $val->post_content !!}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @foreach ($associated_posts as $val)
        <section class="section career-detail">
            <div class="wrap">
                @if ($loop->iteration % 2 != 0)
                    <div class="detail-grid reveal in image-content">
                        <div>
                            <div class="db-thumb">
                                <img src="{{ $val->thumbnail ? asset('uploads/original/' . $val->thumbnail) : asset('assets/img/ese.png') }}"
                                    alt="{{ $val->title }}">
                            </div>
                        </div>

                        <div>
                            <span class="eyebrow on-light">
                                Career
                            </span>
                            <h2 style="margin-top:16px;">
                                {{ $val->title }}
                            </h2>
                            <div class="career-detail-content">
                                {!! $val->brief !!}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="detail-grid reveal in content-image">
                        <div>
                            <span class="eyebrow on-light">
                                Career
                            </span>
                            <h2 style="margin-top:16px;">
                                {{ $val->title }}
                            </h2>
                            <div class="career-detail-content">
                                {!! $val->brief !!}
                            </div>
                        </div>

                        <div>
                            <div class="db-thumb">
                                <img src="{{ $val->thumbnail ? asset('uploads/original/' . $val->thumbnail) : asset('assets/img/ese.png') }}"
                                    alt="{{ $val->title }}">
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endforeach

@stop
