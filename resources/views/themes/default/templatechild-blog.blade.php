@extends('themes.default.common.master')

@section('title', $data->post_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->page_thumbnail)

@section('content')

    <section class="blog-magazine">
        <div class="wrap">

            <div class="magazine-breadcrumb">
                <a href="{{ url('/') }}">Home</a> /
                {{ $pos_type->post_type }}
            </div>

            <div class="magazine-layout">

                <main class="magazine-main">

                    <div class="magazine-header">

                        <span class="magazine-label">LATEST {{ strtoupper(get_post_parent_title($data->uri) ?: '') }}</span>

                        <h1>{{ $data->post_title }}</h1>

                        @if ($data->sub_title)
                            <p>{{ $data->sub_title }}</p>
                        @endif

                        <div class="magazine-date">
                            <i class="fa fa-calendar"></i>
                            {{ \Carbon\Carbon::parse($data->post_date)->format('F d, Y') }}
                        </div>

                    </div>

                    @if ($data->page_thumbnail)
                        <div class="magazine-featured">
                            <img src="{{ $data->page_thumbnail ? asset(env('PUBLIC_PATH') . 'uploads/medium/' . $data->page_thumbnail) : asset('themes-assets/images/nbsm-default.jpg') }}" alt="{{ $data->post_title }}">
                        </div>
                    @endif

                    <div class="magazine-content">
                        {!! $data->post_content !!}
                    </div>

                </main>

                <aside class="magazine-sidebar">

                    <div class="magazine-sidebar-heading">
                        <span>EXPLORE MORE</span>
                        <h3>Related {{ (get_post_parent_title($data->uri) ?: '') }}</h3>
                    </div>

                    <div class="magazine-related-grid">

                        @forelse($related->take(4) as $item)
                            <a href="{{ route('page.pagedetail', ['parent' => get_post_parent_uri($item->post_parent), 'uri' => $item->uri]) }}" class="magazine-related-card">

                                @if ($item->page_thumbnail)
                                    <div class="magazine-related-image">
                                        <img src="{{ $item->page_thumbnail ? asset(env('PUBLIC_PATH') . 'uploads/medium/' . $item->page_thumbnail) : asset('themes-assets/images/nbsm-default.jpg') }}"
                                            alt="{{ $item->post_title }}">
                                    </div>
                                @endif

                                <div class="magazine-related-info">

                                    <span>
                                        {{ \Carbon\Carbon::parse($item->post_date)->format('M d, Y') }}
                                    </span>

                                    <h4>{{ $item->post_title }}</h4>

                                    <span class="magazine-read-more">
                                        Read Article →
                                    </span>

                                </div>

                            </a>

                        @empty
                            <p>No related articles available.</p>
                        @endforelse

                    </div>

                </aside>

            </div>
        </div>
    </section>

@stop
