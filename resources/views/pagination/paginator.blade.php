@if ($paginator->lastPage() > 1)
    <nav aria-label="Pagination">
        <ul class="pagination justify-content-center">
            <li class="page-item{{ ($paginator->onFirstPage()) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->url(1) }}" aria-label="First Page">Inizio</a>
            </li>

            <li class="page-item{{ ($paginator->onFirstPage()) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                    &lt; Precedente
                </a>
            </li>

            @php
                $numLinks = 2; // Number of links to show before and after the current page
                $start = max($paginator->currentPage() - $numLinks, 1);
                $end = min($paginator->currentPage() + $numLinks, $paginator->lastPage());
            @endphp

            @if ($start > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url(1) }}">1</a>
                </li>
                @if ($start > 2)
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-disabled="true">...</a>
                    </li>
                @endif
            @endif

            @for ($i = $start; $i <= $end; $i++)
                <li class="page-item{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($end < $paginator->lastPage())
                @if ($end < $paginator->lastPage() - 1)
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-disabled="true">...</a>
                    </li>
                @endif
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
                </li>
            @endif

            <li class="page-item{{ ($paginator->hasMorePages()) ? '' : ' disabled' }}">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                    Successivo &gt;
                </a>
            </li>

            <li class="page-item{{ ($paginator->hasMorePages()) ? '' : ' disabled' }}">
                <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" aria-label="Last Page">Fine</a>
            </li>
        </ul>
        <div class="pagination-info d-flex justify-content-center">
            Mostrando {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} di {{ $paginator->total() }} elementi
        </div>
    </nav>
@endif
