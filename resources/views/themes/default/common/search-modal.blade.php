<div class="search-modal" id="site-search-modal" role="dialog" aria-modal="true" aria-labelledby="site-search-title"
    aria-hidden="true">

    <div class="search-modal-backdrop" data-search-close></div>

    <div class="search-modal-panel">

        <div class="search-modal-heading">
            <div>
                <span class="search-modal-eyebrow">
                    {{ $setting->site_name }}
                </span>

                <h2 id="site-search-title">
                    What are you looking for?
                </h2>
            </div>

            <button class="search-modal-close" type="button" aria-label="Close search" data-search-close>
                &times;
            </button>
        </div>

        <form class="site-search-form" action="{{ route('search') }}" method="GET" role="search" id="site-search-form">

            <label class="visually-hidden" for="site-search-input">
                Search the website
            </label>

            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">

                <circle cx="11" cy="11" r="7" />
                <path d="M21 21l-4.35-4.35" />

            </svg>

            <input id="site-search-input" type="search" name="q" placeholder="Search services, insights, industries..."
                autocomplete="off" required>

            <button type="submit" class="btn btn-cyan">
                Search
            </button>

        </form>

        {{-- AJAX search suggestions --}}
        <div id="search-suggestions" class="search-suggestions" aria-live="polite">
        </div>

        <p class="search-modal-hint">
            Search across NBSM services, publications, insights and more.
        </p>

    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const input = document.getElementById('site-search-input');
        const form = document.getElementById('site-search-form');
        const suggestions = document.getElementById('search-suggestions');

        if (!input || !form || !suggestions) {
            return;
        }

        let searchTimer = null;

        /*
        |--------------------------------------------------------------------------
        | Search Suggestions
        |--------------------------------------------------------------------------
        */

        input.addEventListener('input', function () {

            const query = this.value.trim();

            clearTimeout(searchTimer);

            // Clear suggestions
            if (query.length < 3) {
                suggestions.innerHTML = '';
                suggestions.style.display = 'none';
                return;
            }

            // Small delay to avoid request on every keystroke
            searchTimer = setTimeout(function () {

                fetch("{{ route('search.suggestions') }}?q=" + encodeURIComponent(query), {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(function (response) {

                        if (!response.ok) {
                            throw new Error('Search request failed.');
                        }

                        return response.json();
                    })
                    .then(function (data) {

                        suggestions.innerHTML = '';

                        if (!data.results || data.results.length === 0) {

                            suggestions.innerHTML = `
                        <div class="search-no-results">
                            No results found for "<strong>${escapeHtml(query)}</strong>"
                        </div>
                    `;

                            suggestions.style.display = 'block';

                            return;
                        }

                        /*
                        |--------------------------------------------------------------------------
                        | Create suggestions
                        |--------------------------------------------------------------------------
                        */

                        data.results.forEach(function (item) {

                            const link = document.createElement('a');

                            link.href = item.url;
                            link.className = 'search-suggestion-item';

                            const typeLabel =
                                item.type === 'post_type'
                                    ? 'Category'
                                    : 'Page';

                            link.innerHTML = `
                        <div class="search-suggestion-content">

                            <span class="search-suggestion-type">
                                ${typeLabel}
                            </span>

                            <strong>
                                ${escapeHtml(item.title || '')}
                            </strong>

                            ${item.subtitle
                                    ? `<small>${escapeHtml(item.subtitle)}</small>`
                                    : ''
                                }

                        </div>
                    `;

                            suggestions.appendChild(link);
                        });

                        suggestions.style.display = 'block';

                    })
                    .catch(function (error) {

                        console.error('Search error:', error);

                        suggestions.innerHTML = '';
                        suggestions.style.display = 'none';

                    });

            }, 250);
        });


        /*
        |--------------------------------------------------------------------------
        | Submit Search
        |--------------------------------------------------------------------------
        |
        | Enter key or Search button will naturally submit:
        |
        | /search?q=your-search
        |
        */

        form.addEventListener('submit', function (event) {

            const query = input.value.trim();

            if (!query) {
                event.preventDefault();
                return;
            }

            // Let the normal GET form submission happen.
            // This will redirect to:
            // /search?q=...
        });


        /*
        |--------------------------------------------------------------------------
        | Close suggestions when clicking outside
        |--------------------------------------------------------------------------
        */

        document.addEventListener('click', function (event) {

            if (
                !suggestions.contains(event.target) &&
                event.target !== input
            ) {
                suggestions.style.display = 'none';
            }

        });


        /*
        |--------------------------------------------------------------------------
        | Escape HTML
        |--------------------------------------------------------------------------
        */

        function escapeHtml(value) {

            const div = document.createElement('div');

            div.textContent = value;

            return div.innerHTML;
        }

    });
</script>
