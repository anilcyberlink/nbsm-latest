@extends('themes.default.common.master')

@section('title', $data->post_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->page_thumbnail)

@section('content')

    <section class="immersive-blog">

        <div class="wrap">

            <div class="immersive-breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <span>/</span>
                <span>{{ $pos_type->post_type }}</span>
            </div>

            {{-- Article Header --}}
            <header class="immersive-header">

                <span class="immersive-label">NBSM-{{ strtoupper(get_post_parent_title($data->uri) ?: '') }}</span>

                <h1>{{ $data->post_title }}</h1>

                @if ($data->sub_title)
                    <p class="immersive-subtitle">
                        {{ $data->sub_title }}
                    </p>
                @endif

                <div class="immersive-meta">
                    <span>
                        <i class="fa fa-calendar"></i>
                        {{ \Carbon\Carbon::parse($data->post_date)->format('F d, Y') }}
                    </span>

                    <span>{{ strtoupper($pos_type->post_type) }} /
                        {{ strtoupper(get_post_parent_title($data->uri) ?: '') }}</span>
                </div>

            </header>

            {{-- Featured Image --}}
            <div class="immersive-cover">
                <img src="{{ $data->page_thumbnail ? asset(env('PUBLIC_PATH') . 'uploads/medium/' . $data->page_thumbnail) : asset('themes-assets/images/nbsm-default.jpg') }}"
                    alt="{{ $data->post_title }}">
            </div>

            {{-- Article Content --}}
            <article class="immersive-content">

                {!! $data->post_content !!}

            </article>

            {{-- Related Articles --}}
            @if (isset($related) && $related->count() > 0)

                <section class="immersive-related">

                    <div class="immersive-related-heading">

                        <div>
                            <span>CONTINUE READING</span>
                            <h2>Related {{ get_post_parent_title($data->uri) ?: '' }}</h2>
                        </div>

                        <p>Explore More {{ get_post_parent_title($data->uri) ?: '' }} From NBSM.</p>

                    </div>

                    <div class="immersive-related-grid">

                        @foreach ($related->take(6) as $item)
                            <a href="{{ route('page.pagedetail', ['parent' => get_post_parent_uri($item->post_parent), 'uri' => $item->uri]) }}" class="immersive-card">

                                <div class="immersive-card-image">
                                    <img src="{{$item->page_thumbnail ? asset(env('PUBLIC_PATH') . 'uploads/medium/' . $item->page_thumbnail) : asset('themes-assets/images/nbsm-default.jpg') }}"
                                    alt="{{ $item->post_title }}">

                                </div>

                                <div class="immersive-card-body">

                                    <span>
                                        {{ \Carbon\Carbon::parse($item->post_date)->format('M d, Y') }}
                                    </span>

                                    <h3>{{ $item->post_title }}</h3>

                                    <div class="immersive-card-link">
                                        Read More →
                                    </div>

                                </div>

                            </a>
                        @endforeach

                    </div>

                </section>

            @endif

        </div>

    </section>

@stop
