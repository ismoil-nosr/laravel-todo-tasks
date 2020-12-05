@if ($paginator->hasPages())
    <nav class="blog-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a href="#" class="btn btn-outline-secondary disabled" aria-disabled="true"><span>@lang('pagination.previous')</a>
        @else
            <a class="btn btn-outline-secondary" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="btn btn-outline-primary" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
        @else
            <a class="btn btn-outline-primary disabled" aria-disabled="true" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
        @endif
    </nav>
@endif