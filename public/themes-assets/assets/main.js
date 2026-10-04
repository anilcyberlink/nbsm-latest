// Header solid-on-scroll + utility bar hide
const header = document.getElementById("site-header");
const utilBar = document.getElementById("utility-bar");
if (header && utilBar) {
  const onScroll = () => {
    if (window.scrollY > 40) {
      header.classList.add("solid");
      utilBar.classList.add("hide");
    } else {
      header.classList.remove("solid");
      utilBar.classList.remove("hide");
    }
  };
  document.addEventListener("scroll", onScroll);
  onScroll();
}
// Animated ascending-bar strip (hero only)
const ascentStrip = document.getElementById("ascent-strip");
if (ascentStrip) {
  const n = 60;
  for (let i = 0; i < n; i++) {
    const bar = document.createElement("div");
    bar.className = "bar";
    const h =
      14 +
      Math.round(
        Math.abs(Math.sin(i / 6)) * 40 + (i / n) * 60 + Math.random() * 10,
      );
    bar.style.height = h + "px";
    bar.style.animationDelay = i * 0.012 + "s";
    ascentStrip.appendChild(bar);
  }
}
// Reveal-on-scroll
const io = new IntersectionObserver(
  (entries) => {
    entries.forEach((e) => {
      if (e.isIntersecting) {
        e.target.classList.add("in");
        io.unobserve(e.target);
      }
    });
  },
  { threshold: 0.14 },
);
document.querySelectorAll(".reveal").forEach((el, i) => {
  el.style.transitionDelay = Math.min(i % 4, 3) * 0.06 + "s";
  io.observe(el);
});
// Active-section nav highlighting — only for same-page anchor links.
// Cross-page nav links (e.g. services.php) are left alone; they get
// their "current page" state via a server-side class in the HTML itself.
const navLinks = Array.from(document.querySelectorAll("nav a.nav-link"));
const sections = navLinks
  .filter((a) => (a.getAttribute("href") || "").startsWith("#"))
  .map((a) => ({ link: a, el: document.querySelector(a.getAttribute("href")) }))
  .filter((s) => s.el);
if (sections.length) {
  const sectionObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        const match = sections.find((s) => s.el === entry.target);
        if (!match) return;
        if (entry.isIntersecting) {
          sections.forEach((s) => s.link.classList.remove("current"));
          match.link.classList.add("current");
        }
      });
    },
    { rootMargin: "-45% 0px -50% 0px", threshold: 0 },
  );
  sections.forEach((s) => sectionObserver.observe(s.el));
}
// Flagship insights tabbed carousel (home + insights index pages only)
(function () {
  const tabs = document.querySelectorAll(".if-tab");
  const panels = document.querySelectorAll(".if-panel");
  if (!tabs.length || !panels.length) return;
  let current = 0,
    timer = null;
  function show(i) {
    panels.forEach((p) => p.classList.remove("active"));
    tabs.forEach((t) => {
      t.classList.remove("active");
      const bar = t.querySelector(".bar");
      if (bar) {
        bar.style.transition = "none";
        bar.style.width = "0";
      }
    });
    panels[i].classList.add("active");
    tabs[i].classList.add("active");
    requestAnimationFrame(() => {
      void tabs[i].offsetWidth;
      const bar = tabs[i].querySelector(".bar");
      if (bar) {
        bar.style.transition = "width 6s linear";
        bar.style.width = "100%";
      }
    });
    current = i;
  }
  function next() {
    show((current + 1) % panels.length);
  }
  tabs.forEach((t) => {
    t.addEventListener("click", () => {
      clearInterval(timer);
      show(parseInt(t.dataset.index, 10));
      timer = setInterval(next, 6000);
    });
  });
  show(0);
  timer = setInterval(next, 6000);
})();
// Mega-menu chevron toggle (for touch devices where hover doesn't apply)
document.querySelectorAll(".nav-item .chevron").forEach((chevron) => {
  chevron.addEventListener("click", (e) => {
    e.preventDefault();
    e.stopPropagation();
    const item = chevron.closest(".nav-item");
    document.querySelectorAll(".nav-item.open").forEach((other) => {
      if (other !== item) other.classList.remove("open");
    });
    item.classList.toggle("open");
  });
});
document.addEventListener("click", (e) => {
  if (!e.target.closest(".nav-item")) {
    document
      .querySelectorAll(".nav-item.open")
      .forEach((item) => item.classList.remove("open"));
  }
});
/* ---------- RESPONSIVE NAVIGATION ---------- */
(function () {
  const header = document.getElementById("site-header");
  const menuToggle = document.getElementById("menu-toggle");
  const navigation = document.getElementById("primary-navigation");
  if (!header || !menuToggle || !navigation) return;
  const mobileQuery = window.matchMedia("(max-width: 980px)");
  function closeMenu() {
    header.classList.remove("menu-open");
    menuToggle.setAttribute("aria-expanded", "false");
    menuToggle.setAttribute("aria-label", "Open navigation menu");
    document.querySelectorAll(".nav-item.open").forEach((item) => {
      item.classList.remove("open");
    });
  }
  menuToggle.addEventListener("click", () => {
    const isOpen = header.classList.toggle("menu-open");
    menuToggle.setAttribute("aria-expanded", String(isOpen));
    menuToggle.setAttribute(
      "aria-label",
      isOpen ? "Close navigation menu" : "Open navigation menu",
    );
    if (!isOpen) {
      closeMenu();
    }
  });
  // Close after selecting a navigation link.
  navigation.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => {
      if (mobileQuery.matches) {
        closeMenu();
      }
    });
  });
  // Close when clicking outside the header.
  document.addEventListener("click", (event) => {
    if (!header.contains(event.target)) {
      closeMenu();
    }
  });
  // Close with Escape.
  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape") {
      closeMenu();
      menuToggle.focus();
    }
  });
  // Reset mobile menu when returning to desktop.
  mobileQuery.addEventListener("change", (event) => {
    if (!event.matches) {
      closeMenu();
    }
  });
})();
/* ---------- SITE SEARCH MODAL ---------- */
(function () {
  const trigger = document.getElementById("search-trigger");
  const modal = document.getElementById("site-search-modal");
  const input = document.getElementById("site-search-input");
  if (!trigger || !modal || !input) return;
  const closeButtons = modal.querySelectorAll("[data-search-close]");
  const panel = modal.querySelector(".search-modal-panel");
  let previousFocus = null;
  function openSearch() {
    previousFocus = document.activeElement;
    modal.classList.add("is-open");
    modal.setAttribute("aria-hidden", "false");
    document.body.classList.add("search-modal-open");
    input.focus();
  }
  function closeSearch() {
    modal.classList.remove("is-open");
    modal.setAttribute("aria-hidden", "true");
    document.body.classList.remove("search-modal-open");
    if (previousFocus) {
      previousFocus.focus();
    }
  }
  trigger.addEventListener("click", openSearch);
  closeButtons.forEach((button) => {
    button.addEventListener("click", closeSearch);
  });
  document.addEventListener("keydown", (event) => {
    if (!modal.classList.contains("is-open")) return;
    if (event.key === "Escape") {
      event.preventDefault();
      closeSearch();
      return;
    }
    // Keep keyboard focus inside the open dialog.
    if (event.key === "Tab") {
      const focusable = modal.querySelectorAll(
        'input, button, a[href], [tabindex]:not([tabindex="-1"])',
      );
      const first = focusable[0];
      const last = focusable[focusable.length - 1];
      if (!first || !last) return;
      if (event.shiftKey && document.activeElement === first) {
        event.preventDefault();
        last.focus();
      } else if (!event.shiftKey && document.activeElement === last) {
        event.preventDefault();
        first.focus();
      }
    }
  });
  // Prevent clicks inside the panel from closing the modal.
  if (panel) {
    panel.addEventListener("click", (event) => {
      event.stopPropagation();
    });
  }
})();
// Contact form (contact.php) — front-end-only prototype submit handler
const cform = document.querySelector("form.cform");
if (cform) {
  cform.addEventListener("submit", (e) => {
    e.preventDefault();
    const note = cform.querySelector(".form-note");
    if (note) note.style.display = "block";
  });
}
