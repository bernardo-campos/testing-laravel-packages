@if ($paginator->hasPages())
<div class="card-footer d-flex justify-content-between">
    <span>
        {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }}/{{ $paginator->total() }}
    </span>
    <ul class="pagination pagination-sm m-0 float-right">
        @if ($paginator->onFirstPage())
            <li class="page-item"><a class="page-link disabled" href="javascript:void(0)">«</a></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">«</a></li>
        @endif

        @foreach ($elements as $element)
            <!-- "Three Dots" Separator -->
            @if (is_string($element))
                <li class="page-item disabled"><a href="#" class="page-link">{{ $element }}</a></li>
            @endif

            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a href="javascript:void(0)" class="page-link">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a href="{{ $url }}" class="page-link" aria-label="{{ __('pagination.goto_page', ['page' => $page]) }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">»</a></li>
        @else
            <li class="page-item"><a class="page-link disabled" href="javascript:void(0)">»</a></li>
        @endif
    </ul>
</div>
@endif