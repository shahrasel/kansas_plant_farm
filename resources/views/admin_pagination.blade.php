@if ($paginator->hasPages())
    <ul class="pagination" style="margin: auto">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><a class="page-link" >Previous</a></li>
        @else
            {{--<li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev">&laquo;</a></li>--}}
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                {{--<li class="page-item disabled">{{ $element }}</li>--}}
                <li class="page-item"><a class="page-link" >...</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        {{--<li class="page-item active">
                            <a href="#" class="page-link">{{ $page }}<span class="sr-only">(current)</span></a>
                        </li>--}}
                        <li class="page-item active"><a class="page-link" >{{ $page }}</a></li>
                    @else
                        {{--<li class="page-item">
                            <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                        </li>--}}
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            {{--<li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next">&raquo;</a></li>--}}
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a></li>
        @else
            {{--<li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>--}}
            <li class="page-item disabled"><a class="page-link" >Next</a></li>
        @endif
    </ul>
@endif
