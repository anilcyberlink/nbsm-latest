@extends('themes.default.common.master')

@section('title', $data->post_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->page_thumbnail)

@section('content')

    <section class="split-blog">

        <div class="wrap">

            <div class="split-breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <span>/</span>
                <span>{{ $pos_type->post_type }}</span>
            </div>

            <div class="split-layout">

                {{-- LEFT SIDEBAR --}}
                <aside class="split-sidebar">

                    <div class="split-sidebar-header">

                        <span>EXPLORE</span>
                        <h3>Related {{ strtoupper(get_post_parent_title($data->uri) ?: '') }}</h3>

                    </div>

                    @forelse($related->take(4) as $item)
                        <a href="{{ route('page.pagedetail', ['parent' => get_post_parent_uri($item->post_parent), 'uri' => $item->uri]) }}" class="split-related-item">

                            <div class="split-related-image">
                                <img src="{{ $item->page_thumbnail ? asset(env('PUBLIC_PATH') . 'uploads/medium/' . $item->page_thumbnail) : asset('themes-assets/images/nbsm-default.jpg') }}"
                                    alt="{{ $item->post_title }}">
                            </div>

                            <div class="split-related-info">

                                <span>
                                    {{ \Carbon\Carbon::parse($item->post_date)->format('d M Y') }}
                                </span>

                                <h4>{{ $item->post_title }}</h4>

                                <small>Read More →</small>

                            </div>

                        </a>

                    @empty

                        <p>No related articles available.</p>
                    @endforelse

                </aside>


                {{-- MAIN ARTICLE --}}
                <main class="split-main">

                    <div class="split-category">
                        NBSM-{{ strtoupper(get_post_parent_title($data->uri) ?: '') }}
                    </div>

                    <h1>{{ $data->post_title }}</h1>

                    @if ($data->sub_title)
                        <p class="split-subtitle">
                            {{ $data->sub_title }}
                        </p>
                    @endif

                    <div class="split-meta">

                        <span>
                            <i class="fa fa-calendar"></i>
                            {{ \Carbon\Carbon::parse($data->post_date)->format('F d, Y') }}
                        </span>

                        <span>{{ ($pos_type->post_type) }} /
                        {{ (get_post_parent_title($data->uri) ?: '') }}</span>

                    </div>

                    {{-- Featured Image --}}
                    <div class="split-featured-image">

                        <img src="{{ $data->page_thumbnail ? asset(env('PUBLIC_PATH') . 'uploads/medium/' . $data->page_thumbnail) : asset('themes-assets/images/nbsm-default.jpg') }}" alt="{{ $data->post_title }}">

                    </div>

                    {{-- Content --}}
                    <article class="split-content">

                        {!! $data->post_content !!}

                    </article>

                    {{-- Article Bottom --}}
                    <div class="split-article-footer">

                        <span>{{$setting->site_name}}</span>

                        <a href="{{ url('/') }}">
                            Back to Home →
                        </a>

                    </div>

                </main>

            </div>

        </div>

    </section>

@stop
