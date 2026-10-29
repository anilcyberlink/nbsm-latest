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
                <a href="{{ url('/') }}">HOME</a> &nbsp;/&nbsp; <a
                    href="{{ url('page/' . posttype_url($pos_type->uri)) }}">{{ $pos_type->post_type }}</a>
                &nbsp;/&nbsp; <span>{{ $data->post_title }}</span>
            </div>
            <span class="eyebrow hero-eyebrow" style="color:var(--cyan)"></span>
            <h1 style="margin-top:16px;">{{ $data->post_title }}</h1>

            <div class="header-pills">
                @foreach ($related as $row)
                    <a href="{{ route('page.pagedetail', ['parent' => $pos_type->uri, 'uri' => $row->uri]) }}"
                        class="header-pill {{ request()->route('uri') == $row->uri ? 'current-pill' : '' }}">{{ $row->post_title }}</a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="outsource-content-section">
        <div class="wrap">
            <div class="outsource-content-grid">
                {{-- Image --}}
                <div class="outsource-image">
                    <img src="{{$data->page_thumbnail ? asset(env('PUBLIC_PATH') . 'uploads/medium/' . $data->page_thumbnail) : asset('themes-assets/images/nbsm-default.jpg') }}"
                        alt="{{ $data->post_title }}" loading="lazy">
                </div>

                {{-- Content --}}
                <div class="outsource-content">
                    @if (!empty($data->sub_title))
                        <span class="outsource-label">
                            {{ $data->sub_title }}
                        </span>
                    @endif

                    <h2>{{ $data->post_title }}</h2>

                    {{-- Excerpt --}}
                    @if (!empty($data->post_excerpt))
                        <div class="outsource-excerpt">
                            {!! $data->post_excerpt !!}
                        </div>
                    @endif

                    {{-- Main Content --}}
                    @if (!empty($data->post_content))
                        <div class="outsource-description">
                            {!! $data->post_content !!}
                        </div>
                    @endif

                    {{-- PDF Download --}}
                    @if (!empty($data->icon))
                        <a href="{{ asset(env('PUBLIC_PATH') . 'uploads/large/' . $data->icon) }}"
                            class="outsource-pdf-btn" target="_blank" rel="noopener noreferrer" download>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                <path d="m7 10 5 5 5-5" />
                                <path d="M12 15V3" />
                            </svg>
                            Download PDF
                        </a>
                    @endif

                </div>
            </div>

        </div>
    </section>

    @if ($data_child->count() > 0)
        <section class="section">
            <div class="wrap">
                <div class="journeys reveal on-light">
                    @foreach ($data_child as $child)
                        <div class="journey card-light">
                            <div class="idx">{{ $child->post_title }}</div>
                            <h4>{!! $child->subtitle !!}</h4>
                            <p>{!! $child->post_content !!}</p>
                        </div>
                    @endforeach
                </div>
                {!! $data_child->links('themes.default.common.pagination') !!}
            </div>
        </section>
    @endif

@stop
