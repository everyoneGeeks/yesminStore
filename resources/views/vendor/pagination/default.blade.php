@if ($paginator->hasPages())
<nav aria-label="Page navigation example" class="">
                            <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())

        <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fas fa-angle-left"></i></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
        @else


        <li class="page-item ">
                                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                                        <span aria-hidden="true"><i class="fas fa-angle-left"></i></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="page-item active"  aria-current="page"><a class="page-link" href="#">{{ $page }}</a></li>
                   
                    @else
                    <li class="page-item "  aria-current="page"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
    
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())

        <li class="page-item">
                                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>

        @else

        <li class="page-item disabled">
                                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>

        @endif
    </ul>
@endif
</nav>





                 