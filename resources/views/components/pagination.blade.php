<div style="margin: 0 auto; margin-top: 20px; font-size: larger; width: fit-content;">
    <ul class="pagination" style="display: flex; list-style: none; padding: 0; margin: 0;">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" style="margin-right: 10px;"><span class="page-link">
                    &lt;&lt; </span></li>
        @else
            <li class="page-item" style="margin-right: 10px;"><a class="item-link item-content external"
                    href="{{ $paginator->url(1) }}&edit_id={{ request('edit_id') }}"> &lt;&lt;
                </a></li>
        @endif

        @if ($paginator->onFirstPage())
            <li class="page-item disabled" style="margin-right: 5px;"><span class="page-link">
                    &lt; </span></li>
        @else
            <li class="page-item" style="margin-right: 5px;"><a class="item-link item-content external"
                    href="{{ $paginator->previousPageUrl() }}&edit_id={{ request('edit_id') }}">
                    &lt; </a></li>
        @endif

        @foreach ($paginator->links()->elements as $element)
            @if (is_string($element))
                <li class="page-item disabled" style="margin-right: 5px;"><span
                        class="page-link">{{ $element }}</span></li>
            @elseif (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" style="margin-right: 5px;" aria-current="page">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item" style="margin-right: 5px;"><a class="item-link item-content external"
                                href="{{ $url }}&edit_id={{ request('edit_id') }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="page-item" style="margin-right: 10px;"><a class="item-link item-content external"
                    href="{{ $paginator->nextPageUrl() }}&edit_id={{ request('edit_id') }}"> &gt;
                </a></li>
        @else
            <li class="page-item disabled" style="margin-right: 10px;"><span class="page-link">
                    &gt;</span></li>
        @endif

        @if ($paginator->currentPage() == $paginator->lastPage())
            <li class="page-item disabled" style="margin-right: 5px;"><span class="page-link">
                    &gt;&gt; </span></li>
        @else
            <li class="page-item" style="margin-right: 5px;"><a class="item-link item-content external"
                    href="{{ $paginator->url($paginator->lastPage()) }}&edit_id={{ request('edit_id') }}">
                    &gt;&gt; </a></li>
        @endif
    </ul>
    </nav>

</div>
