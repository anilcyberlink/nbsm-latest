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
        <span class="eyebrow hero-eyebrow" style="color:var(--cyan)">{{ $data->sub_title }}</span>
        <h1 style="margin-top:16px;">{{ $data->post_title }}</h1>
        <div class="lead lead-new">{!! $data->post_excerpt !!}</div>

        <div class="header-pills">
            @foreach ($related as $row)
                <a href="{{ route('page.pagedetail', ['parent' => $pos_type->uri, 'uri' => $row->uri]) }}"
                    class="header-pill {{ request()->route('uri') == $row->uri ? 'current-pill' : '' }}">{{ $row->post_title }}</a>
            @endforeach
        </div>
    </div>
</section>

<section class="section">
    <div class="wrap">
        <div class="outsourcing-grid reveal">
            @foreach($data_child as $child)
                <div class="outsource-card">
                    <h3>{{ $child->post_title }}</h3>
                    <p class="desc">
                        {!! $child->post_excerpt !!}
                    </p>
                </div>
            @endforeach
        </div>
        {!! $data_child->links('themes.default.common.pagination') !!}
        {{-- <div class="platform-row reveal">
            <div class="platform-cell">CaseWare</div>
            <div class="platform-cell">QuickBooks</div>
            <div class="platform-cell">Xero</div>
            <div class="platform-cell">Tally</div>
            <div class="platform-cell">SAP</div>
        </div> --}}
    </div>
</section>
<section class="career-banner">
    <div class="wrap">
        <h2>Considering Nepal for outsourcing or investment?</h2>
        <a href="{{ url('page/' . posttype_url($contact->uri)) }}" class="btn btn-ghost">See the Nepal microsite <svg viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M13 6l6 6-6 6" />
            </svg></a>
    </div>
</section>

@stop
