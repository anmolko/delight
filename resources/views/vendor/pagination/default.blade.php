@if ($paginator->hasPages())
<ul class="clearfix">

    @if ($paginator->onFirstPage())
    <li class="prev-post disabled"><a title="This is the first page of blog"><span class="flaticon-back-1"></span></a></li>

    @else
    <li class="prev-post disabled"><a  href="{{ $paginator->previousPageUrl() }}" ><span class="flaticon-back-1"></span></a></li>
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
                <li class="active"><a href="#" >{{ $i }}</a></li>
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
        <li class="next-post"><a href="{{ $paginator->nextPageUrl() }}"><span class="flaticon-next-1"></span></a></li>
    @else
    <li class="next-post"><a title="This is the last page of blog"><span class="flaticon-next-1"></span></a></li>

    @endif

</ul>


@endif



