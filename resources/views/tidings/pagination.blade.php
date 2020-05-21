@if ($paginator->hasPages())
    <div class="pagination">
        <ul>
            @if ($paginator->onFirstPage())
                <li><span><i class="fa fa-angle-left"></i></span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" title=""><i class="fa fa-angle-left"></i></a></li>
            @endif

            <ul>
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li><span class="pagination-ellipsis"><span>{{ $element }}</span></span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active"><a disabled>{{ $page }}</a></li>
                            @else
                                <li><a href="{{ $url }}" >{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </ul>

            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" title=""><i class="fa fa-angle-right"></i></a></li>
            @else
                <li><span><i class="fa fa-angle-right"></i></span></li>
            @endif
        </ul>
    </div>
@endif