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
        <p class="lead">{!! $data->content !!}</p>
    </div>
</section>

<section class="section">
    <div class="wrap">
        <div class="about-grid">
            <div class="reveal">
                <span class="eyebrow on-light">Why join NBSM</span>
                <h2 style="margin-top:18px;font-size:clamp(26px,3vw,38px);">Build your career at Nepal&rsquo;s most
                    internationally connected firm.</h2>
                <div class="about-copy" style="margin-top:24px;">
                    <p>As a leading accounting firm in Nepal, we challenge our people to learn more, look into depth,
                        and offer them knowledge and training to help them learn something new every day. We encourage
                        high aspirations and create a customised career path for every team member.</p>
                    <p>We believe in a supportive and diverse workplace and are a merit-based, equal-opportunity
                        employer. Because we offer a wide range of services, we look for a wide range of people &mdash;
                        individuals who bring new perspectives to existing scenarios. Bright. Creative thinkers.
                        Challenge seekers.</p>
                    <p>Our recruiting standards are high, with a strong emphasis on practical work experience, academic
                        achievement, an agile mind, professional commitment, and excellent interpersonal, written and
                        oral communication skills. We offer competitive remuneration and excellent career prospects,
                        including international assignments through Moore Global.</p>
                </div>
                <a href="mailto:career@nbsm.com.np" class="btn btn-primary" style="margin-top:28px;">Email
                    career@nbsm.com.np <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M13 6l6 6-6 6" />
                    </svg></a>
            </div>
            <div class="about-panel reveal">
                <div class="row"><span class="l">Team of professionals</span><span class="n">130+</span></div>
                <div class="row"><span class="l">Full-time Chartered Accountants</span><span class="n">35+</span></div>
                <div class="row"><span class="l">Offices</span><span class="n">Kathmandu &amp; Butwal</span></div>
                <div class="row"><span class="l">Global network</span><span class="n">Moore Global</span></div>
            </div>
        </div>
    </div>
</section>
<section class="section bg-paper">
    <div class="wrap">
        <div class="section-head reveal">
            <span class="eyebrow on-light">Our employment vision</span>
            <h2>Every member of NBSM is capable of excellence.</h2>
            <p>From the most senior partner to the newest recruit, every member of NBSM&rsquo;s staff is expected to
                shoulder their responsibilities with creativity and enthusiasm. Our people are distinguished by
                integrity, motivation, team spirit and pride in their work.</p>
        </div>
        <div class="case-grid reveal">
            <div class="simple-card"><span class="eyebrow on-light">Development</span>
                <h4 style="margin-top:12px;font-size:17px;">Skills-enhancement workshops</h4>
                <p style="margin-top:10px;font-size:13.5px;color:var(--slate);">Regular training to equip our workforce
                    with new and improved skills and techniques, so we can serve clients better.</p>
            </div>
            <div class="simple-card"><span class="eyebrow on-light">Exposure</span>
                <h4 style="margin-top:12px;font-size:17px;">Real industry &amp; market insight</h4>
                <p style="margin-top:10px;font-size:13.5px;color:var(--slate);">The opportunity to build deep insight
                    into a particular industry or market, increasing your value and expertise over time.</p>
            </div>
            <div class="simple-card"><span class="eyebrow on-light">Environment</span>
                <h4 style="margin-top:12px;font-size:17px;">Supportive &amp; fair workplace</h4>
                <p style="margin-top:10px;font-size:13.5px;color:var(--slate);">Best-in-class pay packages and a
                    congenial working environment, because we believe your development is our growth.</p>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="wrap">
        <div class="section-head reveal">
            <span class="eyebrow on-light">Open roles</span>
            <h2>Current opportunities.</h2>
            <p>We recruit on a rolling basis across all six service lines. Don&rsquo;t see the exact role you&rsquo;re
                looking for &mdash; email your CV and a recent photograph to career@nbsm.com.np anyway.</p>
        </div>
        <div class="case-grid reveal">
            <div class="simple-card"><span class="eyebrow on-light">Audit &amp; Assurance</span>
                <h4 style="margin-top:12px;font-size:17px;">Audit Associates &amp; Seniors</h4>
            </div>
            <div class="simple-card"><span class="eyebrow on-light">Tax</span>
                <h4 style="margin-top:12px;font-size:17px;">Tax Associates</h4>
            </div>
            <div class="simple-card"><span class="eyebrow on-light">Accounting &amp; Outsourcing</span>
                <h4 style="margin-top:12px;font-size:17px;">Outsourcing Accountants</h4>
            </div>
        </div>
    </div>
</section>

@stop
