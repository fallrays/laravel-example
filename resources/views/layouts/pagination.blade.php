@if ($paginator->hasPages())
<ul class="pagination pagination-outline">
    <li class="page-item first @if ($paginator->onFirstPage()) disabled @endif">
        <a href="{{ $paginator->url(1) }}" class="page-link px-0">
            <i class="ki-duotone ki-double-left fs-2"><span class="path1"></span><span class="path2"></span></i>
        </a>
    </li>

    <li class="paginate_button page-item previous @if ($paginator->onFirstPage()) disabled @endif">
        <a href="{{ $paginator->previousPageUrl() }}" aria-controls="kt_ecommerce_sales_table" data-dt-idx="0" tabindex="0" class="page-link">
            <i class="previous"></i>
        </a>
    </li>

    @foreach ($elements as $element)
        @if (is_string($element))
        <li class="paginate_button page-item active">
            <a href="#" aria-controls="kt_ecommerce_sales_table" data-dt-idx="1" tabindex="0" class="page-link">$element</a>
        </li>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li class="paginate_button page-item  active">
                    <a href="#" aria-controls="kt_ecommerce_sales_table" data-dt-idx="{{ $page }}" tabindex="0" class="page-link">{{ $page }}</a>
                </li>
                @else
                <li class="paginate_button page-item">
                    <a href="{{ $url }}" aria-controls="kt_ecommerce_sales_table" data-dt-idx="{{ $page }}" tabindex="0" class="page-link">{{ $page }}</a>
                </li>
                @endif
            @endforeach
        @endif
    @endforeach

    <li class="paginate_button page-item next @if (!$paginator->hasMorePages()) disabled @endif">
        <a href="{{ $paginator->nextPageUrl() }}" aria-controls="kt_ecommerce_sales_table" data-dt-idx="{{ $paginator->currentPage() }}" tabindex="0" class="page-link"><i class="next"></i></a>
    </li>

    <li class="page-item last @if ($paginator->onLastPage()) disabled @endif">
        <a href="{{ $paginator->url($paginator->lastPage()) }}" class="page-link px-0">
            <i class="ki-duotone ki-double-right fs-2"><span class="path1"></span><span class="path2"></span></i>
        </a>
    </li>

</ul>
@endif 