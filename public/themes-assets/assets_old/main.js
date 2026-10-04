// Header solid-on-scroll + utility bar hide
const header = document.getElementById('site-header');
const utilBar = document.getElementById('utility-bar');
if (header && utilBar) {
    const onScroll = () => {
        if (window.scrollY > 40) { header.classList.add('solid'); utilBar.classList.add('hide'); }
        else { header.classList.remove('solid'); utilBar.classList.remove('hide'); }
    };
    document.addEventListener('scroll', onScroll);
    onScroll();
}

// Animated ascending-bar strip (hero only)
const ascentStrip = document.getElementById('ascent-strip');
if (ascentStrip) {
    const n = 60;
    for (let i = 0; i < n; i++) {
        const bar = document.createElement('div');
        bar.className = 'bar';
        const h = 14 + Math.round(Math.abs(Math.sin(i / 6)) * 40 + (i / n) * 60 + Math.random() * 10);
        bar.style.height = h + 'px';
        bar.style.animationDelay = (i * 0.012) + 's';
        ascentStrip.appendChild(bar);
    }
}

// Reveal-on-scroll
const io = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
}, { threshold: 0.14 });
document.querySelectorAll('.reveal').forEach((el, i) => {
    el.style.transitionDelay = Math.min(i % 4, 3) * 0.06 + 's';
    io.observe(el);
});

// Active-section nav highlighting — only for same-page anchor links.
// Cross-page nav links (e.g. services.html) are left alone; they get
// their "current page" state via a server-side class in the HTML itself.
const navLinks = Array.from(document.querySelectorAll('nav a.nav-link'));
const sections = navLinks
    .filter(a => (a.getAttribute('href') || '').startsWith('#'))
    .map(a => ({ link: a, el: document.querySelector(a.getAttribute('href')) }))
    .filter(s => s.el);

if (sections.length) {
    const sectionObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            const match = sections.find(s => s.el === entry.target);
            if (!match) return;
            if (entry.isIntersecting) {
                sections.forEach(s => s.link.classList.remove('current'));
                match.link.classList.add('current');
            }
        });
    }, { rootMargin: '-45% 0px -50% 0px', threshold: 0 });
    sections.forEach(s => sectionObserver.observe(s.el));
}

// Flagship insights tabbed carousel (home + insights index pages only)
(function () {
    const tabs = document.querySelectorAll('.if-tab');
    const panels = document.querySelectorAll('.if-panel');
    if (!tabs.length || !panels.length) return;

    let current = 0, timer = null;
    function show(i) {
        panels.forEach(p => p.classList.remove('active'));
        tabs.forEach(t => {
            t.classList.remove('active');
            const bar = t.querySelector('.bar');
            if (bar) { bar.style.transition = 'none'; bar.style.width = '0'; }
        });
        panels[i].classList.add('active');
        tabs[i].classList.add('active');
        requestAnimationFrame(() => {
            void tabs[i].offsetWidth;
            const bar = tabs[i].querySelector('.bar');
            if (bar) { bar.style.transition = 'width 6s linear'; bar.style.width = '100%'; }
        });
        current = i;
    }
    function next() { show((current + 1) % panels.length); }
    tabs.forEach(t => {
        t.addEventListener('click', () => {
            clearInterval(timer);
            show(parseInt(t.dataset.index, 10));
            timer = setInterval(next, 6000);
        });
    });
    show(0);
    timer = setInterval(next, 6000);
})();

// Resource category tabs (insights.html — Publications / News & Events / Press Release / Blog)
(function () {
    const tabs = document.querySelectorAll('.res-tab');
    const panels = document.querySelectorAll('.res-panel');
    if (!tabs.length || !panels.length) return;

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const category = tab.dataset.category;
            tabs.forEach(t => {
                const isActive = t === tab;
                t.classList.toggle('active', isActive);
                t.setAttribute('aria-selected', isActive ? 'true' : 'false');
            });
            panels.forEach(p => {
                p.style.display = p.dataset.category === category ? 'flex' : 'none';
            });
        });
    });
})();

// Mobile nav toggle
document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('navToggle');
    const nav = document.getElementById('mainNav');
    const overlay = document.getElementById('navOverlay');
    if (!toggle || !nav || !overlay) return;

    function closeNav() {
        nav.classList.remove('open');
        toggle.classList.remove('active');
        toggle.setAttribute('aria-expanded', 'false');
        overlay.classList.remove('show');
        document.body.classList.remove('nav-open');
    }

    function openNav() {
        nav.classList.add('open');
        toggle.classList.add('active');
        toggle.setAttribute('aria-expanded', 'true');
        overlay.classList.add('show');
        document.body.classList.add('nav-open');
    }

    toggle.addEventListener('click', function () {
        nav.classList.contains('open') ? closeNav() : openNav();
    });

    overlay.addEventListener('click', closeNav);

    nav.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', closeNav);
    });

    window.addEventListener('resize', function () {
        if (window.innerWidth > 900) closeNav();
    });
});

// Leader brief read-more toggle
document.querySelectorAll('.leader-brief-toggle').forEach(function (btn) {
    btn.addEventListener('click', function () {
        const content = document.getElementById(btn.dataset.target);
        const isExpanded = content.classList.toggle('expanded');
        btn.classList.toggle('expanded', isExpanded);
        btn.firstChild.textContent = isExpanded ? 'Read less ' : 'Read more ';
    });
});
