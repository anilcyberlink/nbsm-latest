@extends('themes.default.common.master')

@section('title', $data->post_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->page_thumbnail)

@section('content')

    <section class="blog-news">
        <div class="wrap">

            <div class="news-breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <span>/</span>
                <span>{{ $pos_type->post_type }}</span>
            </div>

            <div class="news-layout">

                <main class="news-main">

                    <div class="news-category">
                        NBSM| {{ strtoupper($pos_type->post_type) }} |
                        {{ strtoupper(get_post_parent_title($data->uri) ?: '') }}
                    </div>

                    <h1>{{ $data->post_title }}</h1>

                    @if ($data->sub_title)
                        <h2>{{ $data->sub_title }}</h2>
                    @endif

                    <div class="news-published">
                        <span>
                            <i class="fa fa-calendar"></i>
                            Published on
                            {{ \Carbon\Carbon::parse($data->post_date)->format('d F Y') }}
                        </span>
                    </div>

                    @if ($data->page_thumbnail)
                        <div class="news-featured">
                            <img src="{{ $data->page_thumbnail ? asset(env('PUBLIC_PATH') . 'uploads/medium/' . $data->page_thumbnail) : asset('themes-assets/images/nbsm-default.jpg') }}"
                                alt="{{ $data->post_title }}">
                        </div>
                    @endif

                    <div class="news-content">
                        {!! $data->post_content !!}
                    </div>

                    <div class="news-footer">
                        <span>End of Article</span>
                    </div>

                </main>

                <aside class="news-sidebar">

                    <div class="news-sidebar-title">
                        <h3>Related {{ get_post_parent_title($data->uri) ?: '' }}</h3>
                        <div></div>
                    </div>

                    @forelse($related as $item)
                        <a href="{{ route('page.pagedetail', ['parent' => get_post_parent_uri($item->post_parent), 'uri' => $item->uri]) }}"
                            class="news-related-item">

                            <div class="news-related-date">
                                {{ \Carbon\Carbon::parse($item->post_date)->format('d M Y') }}
                            </div>

                            <h4>{{ $item->post_title }}</h4>

                            <span>Read More →</span>

                        </a>

                    @empty
                        <p>No related news available.</p>
                    @endforelse

                </aside>

            </div>
        </div>
    </section>

@stop
