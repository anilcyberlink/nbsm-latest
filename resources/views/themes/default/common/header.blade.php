<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBSM</title>
    <!-- PNG Favicon Code -->
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta name="description"
        content="NBSM & Associates — an internationally connected professional-services firm headquartered in Nepal. Audit, Tax, Deal Advisory, Risk & Consulting, Accounting & Outsourcing, Technology & Digital. Member of Moore Global.">
    <link rel="stylesheet" href="{{ asset('themes-assets/assets/styles.css') }}">
</head>

<body>
    @include('themes.default.common.topbar')
    <header id="site-header">
        <div class="wrap">
            <a href="{{url('/')}}" class="logo-wrap">
                <img class="logo-mark logo-mark-dark" src="{{ asset('themes-assets/assets/img/logo-ondark.png') }}" alt="NBSM &amp; Associates"
                    style="display:none;">
                <img class="logo-mark logo-mark-light" src="{{ asset('themes-assets/assets/img/logo.png') }}" alt="NBSM &amp; Associates">
            </a>
            <button class="menu-toggle" id="menu-toggle" type="button" aria-label="Open navigation menu"
                aria-controls="primary-navigation" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="nav-group">
                <nav id="primary-navigation">
                    <div class="nav-item"><a class="nav-link featured" href="insights.php">Insights <svg class="chevron"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M6 9l6 6 6-6" />
                            </svg></a>
                        <div class="mega-panel"><a href="publications.php">Publications</a><a
                                href="news-events.php">News & Events</a><a href="press-release.php">Press Release</a><a
                                href="blog.php">Blog</a></div>
                    </div>
                    <div class="nav-item"><a class="nav-link" href="about.php">Who We Are <svg class="chevron"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M6 9l6 6 6-6" />
                            </svg></a>
                        <div class="mega-panel"><a href="about.php">Our Story</a><a href="mission-vision.php">Mission &
                                Vision</a><a href="way-we-work.php">The Way We Work</a><a href="our-leaders.php">Our
                                Leaders</a></div>
                    </div>
                    <div class="nav-item"><a class="nav-link" href="services.php">Services <svg class="chevron"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M6 9l6 6 6-6" />
                            </svg></a>
                        <div class="mega-panel wide"><a href="audit-assurance.php">Audit & Assurance</a><a
                                href="tax.php">Tax</a><a href="deal-advisory.php">Deal Advisory</a><a
                                href="risk-consulting.php">Risk & Consulting</a><a
                                href="accounting-outsourcing.php">Accounting & Outsourcing</a><a
                                href="technology-digital.php">Technology & Digital</a></div>
                    </div>
                    <div class="nav-item"><a class="nav-link" href="industries.php">Industries <svg class="chevron"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M6 9l6 6 6-6" />
                            </svg></a>
                        <div class="mega-panel wide"><a href="banking-financial-services.php">Banking & Financial
                                Services</a><a href="energy-infrastructure.php">Energy & Infrastructure</a><a
                                href="manufacturing.php">Manufacturing</a><a
                                href="technology-telecommunications.php">Technology & Telecommunications</a><a
                                href="trading-consumer.php">Trading & Consumer</a><a
                                href="hospitality-tourism.php">Hospitality & Tourism</a><a
                                href="healthcare-education.php">Healthcare & Education</a><a
                                href="development-non-profit.php">Development & Non-Profit</a><a
                                href="real-estate-construction.php">Real Estate & Construction</a></div>
                    </div>
                    <div class="nav-item"><a class="nav-link" href="global.php">Global <svg class="chevron"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M6 9l6 6 6-6" />
                            </svg></a>
                        <div class="mega-panel"><a href="reach.php">Global Reach</a><a href="moore-global.php">Moore
                                Global Network</a><a href="outsourcing.php">Global Outsourcing</a></div>
                    </div>
                    <a class="nav-link" href="contact.php">Contact</a>
                </nav>
                <div class="header-cta">
                    <a href="contact.php" class="btn btn-cyan">Request a Proposal <svg viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M13 6l6 6-6 6" />
                        </svg></a>
                </div>
            </div>
        </div>
    </header>
    <div id="top"></div>
