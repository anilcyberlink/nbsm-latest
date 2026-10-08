@extends('themes.default.common.master')
@section('post_title', $data->post_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')

<section class="page-header">
    <div class="ascent-strip" id="ascent-strip" aria-hidden="true"></div>
    <div class="wrap">
        <div class="breadcrumb"><a href="{{ url('/') }}">Home</a> &nbsp;/&nbsp; <span>{{ $data->post_type }}</span></div>
        <span class="eyebrow hero-eyebrow" style="color:var(--cyan)">{{ $data->uid }}</span>
        <h1 style="margin-top:16px;">{{ $data->caption }}</h1>
        <div class="lead lead-new">{!! $data->content !!}</div>
    </div>
</section>
<section class="section">
    <div class="wrap">
        <div class="if-cadence reveal" style="margin-bottom:50px;">
            <div class="c" style="color:var(--slate);"><b style="color:var(--harbor);">2&ndash;4</b>short insights each
                month</div>
            <div class="c" style="color:var(--slate);"><b style="color:var(--harbor);">1</b>major publication each
                quarter</div>
            <div class="c" style="color:var(--slate);"><b style="color:var(--harbor);">1</b>sector insight each month
            </div>
        </div>
        <div class="services-grid reveal">
            @foreach ($posts as $row)
                <div class="service-card has-visual">
                    <div class="card-visual" style="height:150px;">
                        <img
                            src="{{ asset('uploads/original/' . $row->page_thumbnail) }}"
                            alt="{{ $row->post_title }}"
                            style="width:100%; height:100%; object-fit:cover; display:block;"
                        >
                    </div>
                    <div class="card-body">
                        <h3>{{ $row->post_title }}</h3>
                        <p>{!! $row->post_excerpt !!}</p>
                        <a class="more" href="{{ route('page.pagedetail',['parent' => $data->uri,'uri' => $row->uri]) }}">View all<svg viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M13 6l6 6-6 6" />
                            </svg></a>
                    </div>
                </div>
            @endforeach
        </div>
        {!! $posts->links('themes.default.common.pagination') !!}
        <div class="reveal" style="margin-top:50px;padding:24px 0;border-top:1px solid var(--stone);">
            <p style="font-size:14px;color:var(--slate);">Priority themes: Nepal Economy &middot; Tax &middot; Business
                &amp; Investment &middot; M&amp;A &middot; NFRS/IFRS &middot; Regulatory Updates &middot; Nepal Budget
                &middot; Sector Insights.</p>
        </div>
    </div>
</section>
<section class="career-banner">
    <div class="wrap">
        <h2>Want sector-specific insight for your business?</h2>
        <a href="{{ url('page/' . posttype_url($contact->uri)) }}" class="btn btn-ghost">Talk to us <svg viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M13 6l6 6-6 6" />
            </svg></a>
    </div>
</section>


@stop
