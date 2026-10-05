<div class="utility-bar" id="utility-bar">
    <div class="wrap">
        <div class="utility-left">
            <a class="" href="{{ url('page/' . posttype_url($insights->uri)) }}">{{ ucfirst(strtolower($insights->post_type)) }}</a>
            <a class="" href="{{ url('page/' . posttype_url($about->uri)) }}">{{ ucfirst(strtolower($about->post_type)) }}</a>
            <a class="" href="{{ url('page/' . posttype_url($global->uri)) }}">{{ ucfirst(strtolower($global->post_type)) }}</a>
        </div>
        <div class="utility-right">
            <a href="{{ url('page/' . posttype_url($nepal->uri)) }}">{{ ucfirst(strtolower($nepal->post_type)) }}</a>
            <span class="divider"></span>
            <a href="{{ url('page/' . posttype_url($career->uri)) }}">{{ ucfirst(strtolower($career->post_type)) }}</a>
            <span class="divider"></span>
            <button
                class="search-trigger"
                id="search-trigger"
                type="button"
                aria-label="Open site search"
                aria-haspopup="dialog"
                aria-controls="site-search-modal">
                <svg class="search-icon" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.4" aria-hidden="true">
                    <circle cx="11" cy="11" r="7" />
                    <path d="M21 21l-4.35-4.35" />
                </svg>
            </button>
        </div>
    </div>
</div>
