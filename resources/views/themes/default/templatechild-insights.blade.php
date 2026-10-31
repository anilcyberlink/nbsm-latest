@extends('themes.default.common.master')

@section('title', $data->post_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->page_thumbnail)

@section('content')

    <section class="blog-editorial">
        <div class="wrap">

            <div class="editorial-breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <span>/</span>
                <span>{{ $pos_type->post_type }}</span>
            </div>

            <div class="editorial-grid">

                {{-- Main Article --}}
                <article class="editorial-article">

                    <div class="editorial-category">
                        {{ strtoupper($pos_type->post_type) }} / {{ strtoupper(get_post_parent_title($data->uri) ?: '') }}
                    </div>

                    <h1>{{ $data->post_title }}</h1>

                    @if ($data->sub_title)
                        <p class="editorial-subtitle">
                            {{ $data->sub_title }}
                        </p>
                    @endif

                    <div class="editorial-meta">
                        <span>
                            <i class="fa fa-calendar"></i>
                            {{ \Carbon\Carbon::parse($data->post_date)->format('F d, Y') }}
                        </span>
                        <span>{{ $setting->site_name }}</span>
                    </div>

                    @if ($data->page_thumbnail)
                        <div class="editorial-featured-image">
                            <img src="{{ $data->page_thumbnail ? asset(env('PUBLIC_PATH') . 'uploads/medium/' . $data->page_thumbnail) : asset('themes-assets/images/nbsm-default.jpg') }}"
                                alt="{{ $data->post_title }}">
                        </div>
                    @endif

                    <div class="editorial-content">
                        {!! $data->post_content !!}
                    </div>

                </article>

                {{-- Related Articles Sidebar --}}
                <aside class="editorial-sidebar">

                    <div class="editorial-sidebar-inner">

                        <h3>Related {{ get_post_parent_title($data->uri) ?: '' }}</h3>

                        @forelse($related->take(5) as $item)
                            <a href="{{ route('page.pagedetail', ['parent' => get_post_parent_uri($item->post_parent), 'uri' => $item->uri]) }}" class="editorial-related-item">

                                @if ($item->page_thumbnail)
                                    <img src="{{ $item->page_thumbnail ? asset(env('PUBLIC_PATH') . 'uploads/medium/' . $item->page_thumbnail) : asset('themes-assets/images/nbsm-default.jpg') }}"
                                        alt="{{ $item->post_title }}">
                                @endif

                                <div>
                                    <span>
                                        {{ \Carbon\Carbon::parse($item->post_date)->format('M d, Y') }}
                                    </span>

                                    <h4>{{ $item->post_title }}</h4>
                                </div>

                            </a>
                        @empty
                            <p>No related items available.</p>
                        @endforelse

                    </div>

                </aside>

            </div>
        </div>
    </section>
@stop
