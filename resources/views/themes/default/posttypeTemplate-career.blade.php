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
        <span class="eyebrow hero-eyebrow" style="color:var(--cyan)">{{ $data->caption }}</span>
        <h1 style="margin-top:16px;">{{ $data->uid }}</h1>
        <p class="lead"></p>
    </div>
</section>

<section class="section">
    <div class="wrap">
        <div class="about-grid">
            <div class="reveal">
                <span class="eyebrow on-light">Why join NBSM</span>
                <h2 style="margin-top:18px;font-size:clamp(26px,3vw,38px);"></h2>
                <div class="about-copy" style="margin-top:24px;">
                    {!! $data->content !!}
                </div>
                <span class="btn btn-primary" style="margin-top:28px;">Email:
                    {{ $setting->email_secondary }} </span>
            </div>

            <div class="about-panel reveal">
                <div class="row"><span class="l">Founded</span><span class="n">{{ $setting->year }}</span></div>
                <div class="row"><span class="l">Team of professionals</span><span
                        class="n">{{ $setting->field3 }}</span></div>
                <div class="row"><span class="l">Full-time Chartered Accountants</span><span
                        class="n">{{ $setting->location2 }}</span></div>
                <div class="row"><span class="l">Offices</span><span class="n">{{ $setting->office }}</span></div>
                <div class="row"><span class="l">Global network</span><span class="n">{{ $setting->network }}
                        Countries</span></div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-paper">
    <div class="wrap">
        @foreach ($posts as $row)
            <div class="section-head reveal">
                <span class="eyebrow on-light">{{ $row->post_title }}</span>
                <h2>{{ $row->sub_title }}.</h2>
                <p>
                    {!! $row->post_excerpt !!}
                </p>
            </div>
            @if ($row->post_child->count())
                <div class="case-grid reveal">
                    @foreach ($row->post_child as $child)
                        <div class="simple-card"><span class="eyebrow on-light">{{ $child->post_title }}</span>
                            <h4 style="margin-top:12px;font-size:17px;">{{ $child->sub_title }}</h4>
                            <p style="margin-top:10px;font-size:13.5px;color:var(--slate);">
                                {{ $child->post_excerpt }}
                            </p>
                        </div>
                    @endforeach
                </div>
            @endif
            <h4 style="margin-bottom:50px;"></h4>
        @endforeach
    </div>
</section>

@stop
