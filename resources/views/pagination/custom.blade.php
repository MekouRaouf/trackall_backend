            @if ($paginator->hasPages())
                <ul class="pagination pagination-month justify-content-center mt-2">
                  @if (!$paginator->onFirstPage())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">«</a></li>
                  @endif
                  @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <p class="page-month">{{ $element }}</p>
                            </a>
                        </li>
                    @endif
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active">
                                    <a class="page-link" href="#">
                                        <p class="page-month">{{ $page }}</p>
                                    </a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">
                                        <p class="page-month">{{ $page }}</p>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                @if ($paginator->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">»</a></li>
                @endif
                </ul>
            @endif