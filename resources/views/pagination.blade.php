@if ($paginator->hasPages())
    <ul class="pagination-box">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            {{--<li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>--}}
            <li><a class="previous" ><i class="pe-7s-angle-left"></i></a></li>
        @else
            {{--<li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev">&laquo;</a></li>--}}
            <li><a class="previous" href="{{ $paginator->previousPageUrl() }}"><i class="pe-7s-angle-left"></i></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                {{--<li class="page-item disabled">{{ $element }}</li>--}}
                <li class="active"><a >1</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        {{--<li class="page-item active">
                            <a href="#" class="page-link">{{ $page }}<span class="sr-only">(current)</span></a>
                        </li>--}}
                        <li class="active"><a >{{ $page }}</a></li>
                    @else
                        {{--<li class="page-item">
                            <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                        </li>--}}
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            {{--<li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next">&raquo;</a></li>--}}
            <li><a class="next" href="{{ $paginator->nextPageUrl() }}"><i class="pe-7s-angle-right"></i></a></li>
        @else
            {{--<li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>--}}
            <li><a class="next" ><i class="pe-7s-angle-right"></i></a></li>
        @endif
    </ul>
@endif
