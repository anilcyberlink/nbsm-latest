@extends('themes.default.common.master')
@section('content')
    <!-- ============ HERO ============ -->
    <section class="hero">
        <div class="hero-scene" aria-hidden="true">
            <img class="hero-photo" src="{{ asset('themes-assets/assets/img/hero-kathmandu.jpg') }}" alt="" />
            <div class="hero-scrim"></div>
            <div class="ascent-strip" id="ascent-strip"></div>
        </div>

        <div class="wrap">
            <div class="hero-inner">
                <span class="eyebrow hero-eyebrow">{{ $setting->site_name }}</span>
                <h1>
                    {{ $banner->title }}
                </h1>
                <p class="lead">
                    {{ $banner->caption }}
                </p>
                <div class="hero-actions">
                    <a href="{{ url('page/' . posttype_url($contact->uri)) }}" class="btn btn-cyan">Talk to an expert
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg></a>
                    <a href="{{ $banner->link }}" class="btn btn-ghost">Learn More</a>
                </div>
                <div class="hero-tagline">
                    {{-- Trusted Advice. <span>Global Perspective.</span> Local Expertise. --}}
                </div>
            </div>
        </div>

        <div class="stat-strip">
            <div class="wrap">
                <div class="stat">
                    <div class="n">{{ $setting->field3 }}</div>
                    <div class="l">Professionals</div>
                </div>
                <div class="stat">
                    <div class="n">{{ $setting->location2 }}</div>
                    <div class="l">Chartered Accountants</div>
                </div>
                <div class="stat">
                    <div class="n">{{ $setting->year }}</div>
                    <div class="l">Founded</div>
                </div>
                <div class="stat">
                    <div class="n">{{ $setting->network }}</div>
                    <div class="l">Countries &mdash; Moore Global network</div>
                </div>
                <div class="stat">
                    <div class="n">{{ $setting->office }}</div>
                    <div class="l">Offices</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ INSIGHTS FLAGSHIP ============ -->
    @if ($resource)
        <section class="insights-flagship" id="insights">
            <div class="wrap">
                <div class="if-head reveal">
                    <span class="eyebrow">{{ $resource->post_type }}</span>
                    <h2>{{ $resource->uid }}</h2>
                    <p>
                        {{ $resource->caption }}
                    </p>
                </div>
            </div>

            <div class="if-stage">

                @foreach ($publications as $index => $item)
                    <div class="if-panel {{ $index === 0 ? 'active' : '' }}" data-panel="{{ $index }}">
                        <div class="if-visual">
                            <svg viewBox="0 0 600 400" preserveAspectRatio="xMidYMid slice"
                                xmlns="http://www.w3.org/2000/svg">
                                @if ($index === 0)
                                    {{-- Visual 1 --}}
                                    <defs>
                                        <linearGradient id="g1" x1="0" y1="0" x2="1"
                                            y2="1">
                                            <stop offset="0%" stop-color="#1CA9E1" stop-opacity="0.5" />
                                            <stop offset="100%" stop-color="#0E3F69" stop-opacity="0" />
                                        </linearGradient>
                                    </defs>
                                    <rect width="600" height="400" fill="url(#g1)" />
                                    <g stroke="#ffffff" stroke-opacity="0.18" stroke-width="1">
                                        <line x1="0" y1="80" x2="600" y2="80" />
                                        <line x1="0" y1="160" x2="600" y2="160" />
                                        <line x1="0" y1="240" x2="600" y2="240" />
                                        <line x1="0" y1="320" x2="600" y2="320" />
                                    </g>
                                    <polyline points="20,320 100,280 180,300 260,220 340,240 420,140 500,170 580,80"
                                        fill="none" stroke="#1CA9E1" stroke-width="4" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <circle cx="580" cy="80" r="7" fill="#ffffff" />
                                @elseif($index === 1)
                                    {{-- Visual 2 --}}
                                    <rect width="600" height="400" fill="#0E3F69" />
                                    <g fill="none" stroke="#1CA9E1" stroke-width="2" stroke-opacity="0.7">
                                        <circle cx="300" cy="200" r="60" />
                                        <circle cx="300" cy="200" r="110" />
                                        <circle cx="300" cy="200" r="160" />
                                    </g>
                                    <circle cx="300" cy="200" r="10" fill="#ffffff" />
                                    <path d="M300,200 L420,120" stroke="#ffffff" stroke-width="2" stroke-opacity="0.5" />
                                    <path d="M300,200 L180,270" stroke="#ffffff" stroke-width="2" stroke-opacity="0.5" />
                                @elseif($index === 2)
                                    {{-- Visual 3 --}}
                                    <rect width="600" height="400" fill="#0E3F69" />
                                    <rect x="60" y="260" width="40" height="90" fill="#1CA9E1" opacity="0.5" />
                                    <rect x="130" y="220" width="40" height="130" fill="#1CA9E1" opacity="0.65" />
                                    <rect x="200" y="180" width="40" height="170" fill="#1CA9E1" opacity="0.8" />
                                    <rect x="270" y="120" width="40" height="230" fill="#1CA9E1" />
                                    <rect x="340" y="150" width="40" height="200" fill="#1CA9E1" opacity="0.85" />
                                    <rect x="410" y="90" width="40" height="260" fill="#ffffff" />
                                    <rect x="480" y="130" width="40" height="220" fill="#1CA9E1" opacity="0.7" />
                                @endif
                            </svg>
                        </div>

                        <div class="if-content">
                            <span class="tag">{{ getpostparent($item->post_parent) }}</span>
                            <h3>
                                {{ $item->post_title }}
                            </h3>
                            <p>
                                {!! $item->post_excerpt ?: strip_tags($item->post_content) !!}
                            </p>
                            <span class="date">
                                {{ \Carbon\Carbon::parse($item->post_date)->format('d M Y') }}
                            </span>
                            <a href="{{ route('page.pagedetail', ['parent' => $resource->uri, 'uri' => $item->uri]) }}"
                                class="btn btn-primary">
                                Read the full analysis
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12h14M13 6l6 6-6 6" />
                                </svg>
                            </a>

                        </div>
                    </div>
                @endforeach

                {{-- Tabs --}}
                <div class="if-tabs" id="if-tabs">
                    @foreach ($publications as $index => $item)
                        <button class="if-tab {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}">
                            {{ $item->post_title }}
                            <span class="bar"></span>
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="wrap">
                <div class="if-more">
                    <p>
                        New analysis published as Nepal&rsquo;s fiscal and regulatory
                        landscape evolves.
                    </p>
                    <a href="{{ url('page/' . posttype_url($resource->uri)) }}" class="btn btn-line"
                        style="border-color: rgba(255, 255, 255, 0.4); color: #fff">View all resources
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg></a>
                </div>
            </div>
        </section>
    @endif

    <!-- ============ AT A GLANCE ============ -->
    <section class="section bg-paper">
        <div class="wrap">
            <div class="about-grid">
                <div class="reveal">
                    @if ($about)
                        <span class="eyebrow on-light">{{ $about->post_type }}</span>
                        <h2 style="margin-top: 18px; font-size: clamp(26px, 3vw, 38px)">
                            {{ $about->uid }}
                        </h2>
                        <div class="about-copy" style="margin-top: 24px">
                            <p>
                                {{ $about->caption }}
                            </p>
                        </div>
                        <a href="{{ url('page/' . posttype_url($about->uri)) }}" class="btn btn-line"
                            style="margin-top: 28px">More about NBSM
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M13 6l6 6-6 6" />
                            </svg></a>
                    @endif
                </div>
                <div class="about-panel reveal">
                    <div class="row">
                        <span class="l">Founded</span><span class="n">{{ $setting->year }}</span>
                    </div>
                    <div class="row">
                        <span class="l">Team of professionals</span><span
                            class="n">{{ $setting->field3 }}</span>
                    </div>
                    <div class="row">
                        <span class="l">Full-time Chartered Accountants</span><span
                            class="n">{{ $setting->location2 }}</span>
                    </div>
                    <div class="row">
                        <span class="l">Global network </span><span class="n">{{ $setting->network }}
                            Countries</span>
                    </div>
                    <div class="row">
                        <span class="l">Local Office</span><span class="n">{{ $setting->office }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ SERVICES TEASER ============ -->
    <section class="section" id="services">
        <div class="wrap">
            <div class="section-head reveal">
                @if ($service)
                    <span class="eyebrow on-light">{{ $service->post_type }}</span>
                    <h2>{{ $service->uid }}</h2>
                    <p>
                        {{ $service->caption }}
                    </p>
                @endif
            </div>
            <div class="services-grid reveal">
                @foreach ($services as $row)
                    @if ($loop->odd)
                        <div class="service-card flagship">
                            <span class="tag">{{ $row->post_title }}</span>
                            <h3 style="margin-top: 12px">{{ $row->sub_title }}</h3>
                            {{-- <p>{!! $row->post_excerpt !!}</p> --}}
                            <a class="more"
                                href="{{ route('page.pagedetail', ['parent' => $service->uri, 'uri' => $row->uri]) }}">Learn
                                more
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12h14M13 6l6 6-6 6" />
                                </svg></a>
                        </div>
                    @else
                        <div class="service-card">
                            <div class="icon-badge">
                                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.6">
                                    <path d="M12 3l8 4v5c0 5-3.5 8.5-8 9-4.5-.5-8-4-8-9V7z" />
                                    <path d="M9 12l2 2 4-4" />
                                </svg>
                            </div>
                            <h3>{{ $row->post_title }}</h3>
                            <p>{{ $row->sub_title }}</p>
                            <a class="more"
                                href="{{ route('page.pagedetail', ['parent' => $service->uri, 'uri' => $row->uri]) }}">Learn
                                more
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12h14M13 6l6 6-6 6" />
                                </svg></a>
                        </div>
                    @endif
                @endforeach
            </div>
            <div style="text-align: center; margin-top: 36px" class="reveal">
                <a href="{{ url('page/' . posttype_url($service->uri)) }}" class="btn btn-line">Explore all services
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M13 6l6 6-6 6" />
                    </svg></a>
            </div>
        </div>
    </section>

    <!-- ============ GLOBAL REACH TEASER ============ -->
    <section class="section vision2030" id="global"
        style="
        background: radial-gradient(
          120% 140% at 100% 0%,
          #124d80 0%,
          var(--ink) 45%,
          #082a48 100%
        );
        color: #fff;
      ">
        <div class="wrap">
            <div class="section-head reveal">
                @if($nepal)
                    <span class="eyebrow">{{ $nepal->post_type }}</span>
                    <h2 style="color: #fff">{{ $nepal->uid }}</h2>
                    <p style="color: rgba(255, 255, 255, 0.65)">
                        {{ $nepal->caption }}
                    </p>
                @endif
            </div>
            <div class="journeys reveal">
                @foreach ($building as $row)
                    <div class="journey">
                        <div class="idx">{{ $row->post_title }}</div>
                        <h4>{{ $row->sub_title }}</h4>
                        <p>
                            {!! $row->post_excerpt !!}
                        </p>
                    </div>
                @endforeach
            </div>
            <div class="moore-badge reveal">
                <img class="moore-logo" src="{{asset('themes-assets/assets/img/moore-logo-ondark.png')}}" alt="Moore Global" />
                <span class="moore-divider"></span>
                <span class="n">{{ $setting->network }}</span>
                <span class="l">countries in the Moore Global network.</span>
            </div>
            <div style="margin-top: 32px" class="reveal cta-row">
                <a href="{{ url('page/' . posttype_url($nepal->uri)) }}" class="btn btn-cyan">Explore our global network
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M13 6l6 6-6 6" />
                    </svg></a>
                <a href="{{ url('page/' . posttype_url($contact->uri)) }}" class="btn btn-cyan">Start the conversation
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M13 6l6 6-6 6" />
                    </svg></a>
            </div>
        </div>
    </section>

    <!-- ============ INDUSTRIES TEASER ============ -->
    <section class="section bg-paper" id="industries">
        <div class="wrap">
            <div class="section-head reveal">
                @if($industry)
                    <span class="eyebrow on-light">{{ $industry->post_type }}</span>
                    <h2>{{ $industry->uid }}</h2>
                    <p>
                        {{ $industry->caption }}
                    </p>
                @endif
            </div>
            <div class="industry-grid reveal">
                @foreach ($industries as $row)
                    <a href="{{ route('page.pagedetail', ['parent' => $industry->uri, 'uri' => $row->uri]) }}">
                        <div class="industry-tile">
                            <span class="num">{{ sprintf('%02d', $loop->iteration) }}</span>
                            <h4>{{ $row->post_title }}</h4>
                        </div>
                    </a>
                @endforeach
            </div>
            <div style="text-align: center; margin-top: 36px" class="reveal">
                <a href="{{ url('page/' . posttype_url($industry->uri)) }}" class="btn btn-line">See all industries
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M13 6l6 6-6 6" />
                    </svg></a>
            </div>
        </div>
    </section>

    <!-- ============ FINAL CTA ============ -->
    <section class="final-cta">
        <div class="wrap">
            <span class="step-num">LET&rsquo;S TALK ABOUT YOUR BUSINESS</span>
            <h2>Trusted advice. Global perspective. Local expertise.</h2>
            <div class="actions">
                <a href="{{ url('page/' . posttype_url($contact->uri)) }}" class="btn btn-cyan">Talk to an expert
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M13 6l6 6-6 6" />
                    </svg></a>
                {{-- <a href="contact.html" class="btn btn-ghost">Request a proposal</a> --}}
            </div>
        </div>
    </section>

    <!-- ============ CONTACT TEASER ============ -->
    <section class="section" id="contact">
        <div class="wrap">
            <div class="section-head reveal">
                <span class="eyebrow on-light">{{ $contact->post_type }}</span>
                <h2>{{ $contact->uid }}</h2>
                <p>
                    {{ $contact->caption }}
                </p>
            </div>
            <div class="contact-grid">
                <div class="reveal">
                    <div class="office">
                        <span class="label">Head Office &mdash; </span>
                        <h4>{{ $setting->location1 }}</h4>
                        <p>
                            {{ $setting->address2 }}
                        </p>
                        <p>{{ $setting->phone }} &middot; {{ $setting->email_primary }}</p>
                    </div>
                    <div class="office">
                        <span class="label">Branch Office &mdash; </span>
                        <h4>{{ $setting->location_link }}</h4>
                        <p>{{ $setting->field2 }}</p>
                        <p>{{ $setting->website2 }} &middot; {{ $setting->field1 }}</p>
                    </div>
                </div>
                <div class="reveal"
                    style="
              display: flex;
              flex-direction: column;
              justify-content: center;
              gap: 20px;
            ">
                    <p style="font-size: 15.5px">
                        {!! $contact->content !!}
                    </p>
                    <a href="{{ url('page/' . posttype_url($contact->uri)) }}" class="btn btn-primary" style="align-self: flex-start">Go to contact page
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg></a>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ CAREERS BANNER ============ -->
    @if($career && $about)
        <section class="career-banner" id="careers">
            <div class="wrap">
                <h2>Take your career to the next level with NBSM.</h2>
                <a href="{{ route('page.pagedetail',['parent' =>$about->uri ,'uri' => $career->uri]) }}" class="btn btn-ghost">Explore careers
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M13 6l6 6-6 6" />
                    </svg></a>
            </div>
        </section>
    @endif

@endsection
@section('libraries')
@endsection
