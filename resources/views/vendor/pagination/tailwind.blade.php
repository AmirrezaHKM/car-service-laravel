@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center space-x-1 rtl">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-blue-500 bg-blue-100 rounded cursor-default leading-5">
                قبلی
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded leading-5 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                قبلی
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span aria-disabled="true" class="relative inline-flex items-center px-4 py-2 -mr-1 text-sm font-medium text-gray-700 bg-white cursor-default leading-5">
                    {{ $element }}
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page" class="relative inline-flex items-center px-4 py-2 -mr-1 text-sm font-medium text-white bg-blue-600 rounded leading-5 cursor-default">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -mr-1 text-sm font-medium text-blue-600 bg-blue-100 rounded leading-5 hover:bg-blue-200 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded leading-5 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                بعدی
            </a>
        @else
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-blue-500 bg-blue-100 rounded cursor-default leading-5">
                بعدی
            </span>
        @endif
    </nav>
@endif
