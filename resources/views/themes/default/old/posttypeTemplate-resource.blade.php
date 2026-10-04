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
            <span class="eyebrow hero-eyebrow" style="color:var(--cyan)">{{ $data->uid }}</span>
            <h1 style="margin-top:16px;">{{ $data->caption }}</h1>
            <div class="lead">{!! $data->content !!}</div>
        </div>
    </section>

    <section class="section" id="reach">
        <div class="wrap">
            <div class="journeys reveal">
                @foreach ($posts as $row)
                    <a href="{{ route('page.pagedetail',['parent' => $data->uri,'uri' => $row->uri]) }}" class="journey">
                        <div class="idx">
                        </div>
                        <h4>
                            {{ $row->post_title }}
                        </h4>
                        @if ($row->post_excerpt)
                            <p>
                                {!! $row->post_excerpt !!}
                            </p>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </section>

@stop
