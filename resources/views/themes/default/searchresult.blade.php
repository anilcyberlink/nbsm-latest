@extends('themes.default.common.master')
@section('title', 'Search Results for ' . $q)
@section('meta_keyword', $q)
@section('meta_description', 'Search results for ' . $q)
@section('thumbnail', '')
@section('content')
    <section class="page-header">
        <div class="ascent-strip" id="ascent-strip" aria-hidden="true"></div>
        <div class="wrap">
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Home</a> &nbsp;/&nbsp; <span>Search Result</span>
            </div>
            <span class="eyebrow hero-eyebrow" style="color:var(--cyan)">Search</span>
            <h1 style="margin-top:16px;">Search Results</h1>
            <p class="lead">
                @if($q)
                    Showing results for: <strong>"{{ $q }}"</strong>
                @else
                    Search our website.
                @endif
            </p>
        </div>
    </section>
    <section class="section">
        <div class="wrap">
            @if($q && ($postTypes->count() || $posts->count()))
                {{-- POST TYPES --}}
                @if($postTypes->count())
                    <div class="reveal" style="margin-bottom:45px;">
                        <span class="eyebrow on-light">Categories</span>
                        <h2 style="margin-top:18px;font-size:clamp(26px,3vw,38px);">
                            Matching Sections
                        </h2>
                        <div class="case-grid" style="margin-top:30px;">
                            @foreach($postTypes as $type)
                                <a href="{{ url('page/' . posttype_url($type->uri)) }}" class="simple-card"
                                    style="text-decoration:none;display:block;">
                                    <span class="eyebrow on-light">Category</span>
                                    <h4 style="margin-top:12px;font-size:17px;">
                                        {{ $type->post_type }}
                                    </h4>
                                    @if($type->caption)
                                        <p style="margin-top:10px;font-size:13.5px;color:var(--slate);">
                                            {{ $type->caption }}
                                        </p>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
                {{-- POSTS --}}
                @if($posts->count())
                    <div class="reveal">
                        <span class="eyebrow on-light">Pages</span>
                        <h2 style="margin-top:18px;font-size:clamp(26px,3vw,38px);">
                            Matching Pages
                        </h2>
                        <div class="case-grid" style="margin-top:30px;">
                            @foreach($posts as $post)
                                <a href="{{ route('page.pagedetail', ['parent' => $post->postType->uri, 'uri' => $post->uri]) }}"
                                    class="simple-card" style="text-decoration:none;display:block;">
                                    <span class="eyebrow on-light">Page</span>
                                    <h4 style="margin-top:12px;font-size:17px;">
                                        {{ $post->post_title }}
                                    </h4>
                                    @if($post->sub_title)
                                        <p style="margin-top:8px;font-size:14px;color:var(--slate);">
                                            {{ $post->sub_title }}
                                        </p>
                                    @endif
                                    @if($post->post_excerpt)
                                        <p style="margin-top:10px;font-size:13.5px;color:var(--slate);">
                                            {!! $post->post_excerpt !!}
                                        </p>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @if($posts->hasPages())
                        <div style="margin-top:45px;">
                            {{ $posts->links() }}
                        </div>
                    @endif
                @endif
            @else
                {{-- NO RESULTS --}}
                <div class="reveal" style="max-width:700px;margin:0 auto;text-align:center;">
                    <span class="eyebrow on-light">Search</span>
                    <h2 style="margin-top:18px;font-size:clamp(26px,3vw,38px);">
                        No results found
                    </h2>
                    <p style="margin-top:15px;color:var(--slate);font-size:15px;">
                        @if($q)
                            We couldn't find anything matching <strong>"{{ $q }}"</strong>.
                            Try searching with a different keyword.
                        @else
                            Please enter a keyword to search our website.
                        @endif
                    </p>
                    <a href="{{ url('/') }}" class="btn btn-cyan" style="margin-top:25px;">
                        Back to Home
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection
