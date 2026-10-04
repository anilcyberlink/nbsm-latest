@extends('themes.default.common.master')
@section('post_title', $data->post_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')

    <section class="page-header">
        <div class="ascent-strip" id="ascent-strip" aria-hidden="true"></div>
        <div class="wrap">
            <div class="breadcrumb"><a href="{{ url('/') }}">Home</a> &nbsp;/&nbsp; <span>{{ $data->post_type }}</span>
            </div>
            <span class="eyebrow hero-eyebrow" style="color:var(--cyan)">{{ $data->post_type }}</span>
            <h1 style="margin-top:16px;">{{ $data->uid }}</h1>
            <div class="lead">{{ $data->caption }}</div>
        </div>
    </section>

    <section class="section">
        <div class="wrap">
            <div class="about-grid reveal in">
                <div>
                    <span class="eyebrow on-light">Who we are</span>
                    <div class="about-copy" style="margin-top:24px;">
                        {!! $data->content !!}
                    </div>
                </div>
                <div class="about-media">
                    <img src="{{ $data->banner ? asset('uploads/medium/' . $data->banner) : asset('assets/img/ese.png') }}"
                        alt="NBSM office">
                </div>
            </div>
        </div>
    </section>

    @foreach ($posts as $row)
        <div class="detail-block reveal in" id="the-way-we-work">
            <div class="wrap">
                <div class="detail-grid">
                    <div>
                        <h2>{{ $row->post_title }}</h2>
                        <div class="db-thumb">
                            <img src="{{ $row->banner ? asset('uploads/medium/' . $row->banner) : asset('assets/img/ese.png') }}"
                                alt="Our story">
                        </div>
                    </div>
                    <div>
                        {!! $row->post_excerpt !!}

                        {!! $row->post_content !!}

                        @if (has_child_post($row->id))
                            <a href="{{ route('page.pagedetail', ['parent' => $data->uri, 'uri' => $row->uri]) }}"
                                class="btn btn-primary">
                                View More
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12h14M13 6l6 6-6 6" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <section class="section leadership-section" id="leaders">
        <div class="wrap">
            <div class="section-head reveal">
                <span class="eyebrow on-light">Leadership</span>
                <h2>Senior people, on every engagement.</h2>
                <p>
                    Every NBSM client works directly with experienced partners and department heads
                    &mdash; not just delegated staff.
                </p>
            </div>

            <div class="leadership-grid">
                @foreach ($members as $mem)
                    <div class="leader-card">
                        <div class="leader-card-top">
                            <div class="leader-image">
                                <img src="{{ asset('uploads/original/' . $mem->thumbnail) }}" alt="{{ $mem->title }}">
                            </div>
                            <div class="leader-info">
                                <span class="eyebrow on-light">
                                    {{ $mem->sub_title }}
                                </span>
                                <h3>{{ $mem->title }}</h3>
                                {{-- <div class="leader-role">
                                    {{ $mem->sub_title }}
                                </div> --}}
                                <div class="leader-contact">
                                    <div class="leader-contact-item">
                                        <span class="leader-contact-icon">☎</span>
                                        <a>
                                            {{ $mem->phone }}
                                        </a>
                                    </div>
                                    <div class="leader-contact-item">
                                        <span class="leader-contact-icon">✉</span>
                                        <a>
                                            {{ $mem->email }}
                                        </a>
                                    </div>

                                </div>

                                <div class="leader-social">

                                    @if ($mem->facebook_link)
                                        <a href="{{ $mem->facebook_link }}" target="_blank" rel="noopener noreferrer"
                                            aria-label="Facebook">

                                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                                <path
                                                    d="M14 8h3V4h-3c-3.31 0-5 1.69-5 5v3H6v4h3v8h4v-8h3l1-4h-4V9c0-.67.33-1 1-1z" />
                                            </svg>

                                        </a>
                                    @endif


                                    @if ($mem->twitter_link)
                                        <a href="{{ $mem->twitter_link }}" target="_blank" rel="noopener noreferrer"
                                            aria-label="Twitter">

                                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                                <path
                                                    d="M18.9 2H22l-6.77 7.74L23.2 22h-6.24l-4.89-6.39L6.48 22H3.36l7.24-8.28L2.8 2h6.4l4.42 5.84L18.9 2zm-1.1 17.85h1.73L8.29 4.05H6.43L17.8 19.85z" />
                                            </svg>

                                        </a>
                                    @endif


                                    @if ($mem->linked_in_link)
                                        <a href="{{ $mem->linked_in_link }}" target="_blank" rel="noopener noreferrer"
                                            aria-label="LinkedIn">

                                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                                <path
                                                    d="M6.5 8.5A2.5 2.5 0 1 0 6.5 3a2.5 2.5 0 0 0 0 5.5zM4 10h5v10H4V10zm7.5 0h4.8v1.37h.07c.67-1.27 2.3-2.6 4.73-2.6 5.06 0 5.99 3.33 5.99 7.66V20h-5v-4.72c0-1.13-.02-2.58-1.57-2.58-1.57 0-1.81 1.22-1.81 2.5V20h-5V10z" />
                                            </svg>

                                        </a>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="leader-brief">
                            <div class="leader-brief-content" id="brief-{{ $mem->id }}">
                                {!! $mem->brief !!}
                            </div>
                            <button type="button" class="leader-brief-toggle" data-target="brief-{{ $mem->id }}">
                                Read more
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M6 9l6 6 6-6" />
                                </svg>
                            </button>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </section>


@stop
