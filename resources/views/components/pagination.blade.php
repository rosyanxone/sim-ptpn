@if ($paginator->hasPages())
    <div class="mt-6 flex flex-col items-center justify-between sm:flex-row">
        <div class="mb-4 sm:mb-0">
            <p class="text-sm text-gray-500">
                {!! __('Showing') !!}
                @if ($paginator->firstItem())
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                @else
                    {{ $paginator->count() }}
                @endif
                {!! __('of') !!}
                <span class="font-medium">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>
        </div>
        <div class="flex items-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button
                    class="rounded-md rounded-l-lg bg-gray-100 px-3 py-1 text-gray-700 hover:bg-gray-200 disabled:opacity-50"
                    disabled>
                    <i class="fas fa-chevron-left"></i>
                </button>
            @else
                <a class="rounded-md rounded-l-lg bg-gray-100 px-3 py-1 text-gray-700 hover:bg-gray-200"
                    href="{{ $paginator->previousPageUrl() }}" rel="prev" disabled>
                    <i class="fas fa-chevron-left"></i>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true">
                        <span
                            class="relative -ml-px inline-flex cursor-default items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-gray-700 dark:border-gray-600 dark:bg-gray-800">
                            {{ $element }}
                        </span>
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button class="bg-green-600 px-3 py-1 text-white hover:bg-green-700" disabled>
                                {{ $page }}
                            </button>
                        @else
                            <a class="bg-gray-100 px-3 py-1 text-gray-700 hover:bg-gray-200" href="{{ $url }}"
                                disabled:opacity-50>
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="rounded-md rounded-r-lg bg-gray-100 px-3 py-1 text-gray-700 hover:bg-gray-200"
                    href="{{ $paginator->nextPageUrl() }}">
                    <i class="fas fa-chevron-right"></i>
                </a>
            @else
                <button
                    class="rounded-md rounded-r-lg bg-gray-100 px-3 py-1 text-gray-700 hover:bg-gray-200 disabled:opacity-50"
                    disabled>
                    <i class="fas fa-chevron-right"></i>
                </button>
            @endif
        </div>
    </div>
@endif
