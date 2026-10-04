@if ($paginator->hasPages())

    <nav class="theme-pagination" aria-label="Pagination">

        {{-- Previous Page --}}
        @if ($paginator->onFirstPage())

            <span class="pagination-btn disabled" aria-disabled="true">
                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path d="M15 18l-6-6 6-6" />
                </svg>
                <span>Previous</span>
            </span>

        @else

            <a href="{{ $paginator->previousPageUrl() }}"
                class="pagination-btn"
                rel="prev">

                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path d="M15 18l-6-6 6-6" />
                </svg>
                <span>Previous</span>

            </a>

        @endif


        {{-- Page Numbers --}}
        <div class="pagination-pages">

            @foreach ($elements as $element)

                {{-- "Three Dots" Separator --}}
                @if (is_string($element))

                    <span class="pagination-dots">
                        {{ $element }}
                    </span>

                @endif


                {{-- Array Of Links --}}
                @if (is_array($element))

                    @foreach ($element as $page => $url)

                        @if ($page == $paginator->currentPage())

                            <span class="pagination-page active"
                                aria-current="page">
                                {{ $page }}
                            </span>

                        @else

                            <a href="{{ $url }}"
                                class="pagination-page">
                                {{ $page }}
                            </a>

                        @endif

                    @endforeach

                @endif

            @endforeach

        </div>


        {{-- Next Page --}}
        @if ($paginator->hasMorePages())

            <a href="{{ $paginator->nextPageUrl() }}"
                class="pagination-btn"
                rel="next">

                <span>Next</span>

                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path d="M9 18l6-6-6-6" />
                </svg>

            </a>

        @else

            <span class="pagination-btn disabled"
                aria-disabled="true">

                <span>Next</span>

                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path d="M9 18l6-6-6-6" />
                </svg>

            </span>

        @endif

    </nav>

@endif
