

@if ($paginator->hasPages())
<ul class="pagination clearfix">

    @if ($paginator->onFirstPage())
    @else
    <li class="disabled"><a  href="{{ $paginator->previousPageUrl() }}" ><i class="fas fa-angle-left"></i></a></li>
    @endif

    @if($paginator->currentPage() > 3)
        <li ><a href="{{ $paginator->url(1) }}">1</a>
    @endif

    @if($paginator->currentPage() > 4)
        <li class="disabled" aria-disabled="true"><a class="seperate-pagination-link">...</a></li>
    @endif

    @foreach(range(1, $paginator->lastPage()) as $i)
        @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
            @if ($i == $paginator->currentPage())
                <li><a href="#" class="active">{{ $i }}</a></li>
            @else
                <li><a href="{{ $paginator->url($i) }}"> {{ $i }}</a></li>
            @endif
        @endif
    @endforeach

    @if($paginator->currentPage() < $paginator->lastPage() - 3)
         <li class="disabled" aria-disabled="true"><a class="seperate-pagination-link">...</a></li>

    @endif
    @if($paginator->currentPage() < $paginator->lastPage() - 2)
        <li><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
    @endif

    @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-angle-right"></i></a></li>
    @endif

</ul>


@endif



