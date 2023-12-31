@if ($paginator->hasPages())
    <nav class="d-flex justify-content-between align-items-center">
        <div>
            <p class="text-muted">
                {!! __('Showing') !!}
                <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                {!! __('to') !!}
                <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                {!! __('of') !!}
                <span class="fw-semibold">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>
        </div>
        <ul class="pagination mb-0">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link" tabindex="-1"><i class="fas fa-chevron-left"></i></span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1"><i
                            class="fas fa-chevron-left"></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span
                            class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}<span
                                        class="sr-only">(current)</span></a></li>
                        @else
                            <li class="page-item"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach


            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link"><i class="fas fa-chevron-right"></i></span>
                </li>
            @endif

        </ul>
    </nav>
@endif
