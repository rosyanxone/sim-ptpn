@extends('layouts.users')

@section('title', 'Pemupukan')
@section('header', 'Kelola Pemupukan')

@section('styles')
    <style>
        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            z-index: 10;
        }

        .dropdown-menu.show {
            display: block;
        }
    </style>
@endsection

@section('content')
    <div class="rounded-lg bg-white p-6 shadow-md">
        <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between">
            <h2 class="mb-4 text-xl font-semibold text-gray-800 md:mb-0">Daftar Pemupukan</h2>
        </div>

        <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div class="flex w-full flex-col gap-3 sm:flex-row md:w-auto">
                <div class="relative">
                    <input
                        class="w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        id="search" type="text" placeholder="Cari pemupukan...">
                    <button class="absolute right-0 top-0 mr-2 mt-2 text-gray-500">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <label class="rounded-md border border-gray-300 pr-2" for="sort-by">
                    <select
                        class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 md:w-fit"
                        id="sort-by">
                        <option value="name-asc">Name (A-Z)</option>
                        <option value="name-desc">Name (Z-A)</option>
                        <option value="price-asc">Price (Low to High)</option>
                        <option value="price-desc">Price (High to Low)</option>
                        <option value="stock-asc">Stock (Low to High)</option>
                        <option value="stock-desc">Stock (High to Low)</option>
                    </select>
                </label>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row">
                <a class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 font-semibold text-white transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    href="{{ route('fertilization.create') }}">
                    <i class="fas fa-plus mr-2"></i> Tambah Pemupukan
                </a>
                <a class="inline-flex items-center justify-center rounded-md border border-transparent bg-yellow-600 px-4 py-2 font-semibold text-white transition hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2"
                    href="{{ route('fertilization.stock.index') }}">
                    <i class="fa-solid fa-layer-group mr-2"></i> Perbarui Pupuk
                </a>
                <div class="dropdown relative">
                    <button
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 font-semibold text-white transition hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                        id="exportDropdown">
                        <i class="fa-solid fa-file-csv mr-2"></i> Export
                    </button>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            scope="col">
                            <div class="flex items-center">
                                Tanah
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            scope="col">
                            <div class="flex items-center">
                                Tahun Tanam
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            scope="col">
                            <div class="flex items-center">
                                Jumlah Pemupukan
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            scope="col">
                            <div class="flex items-center">
                                Tanggal Pemupukan
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            scope="col">
                            Diubah Oleh
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($fertilizations as $fertilization)
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $fertilization->land->land_area }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $fertilization->land->land_location }}
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                {{ $fertilization->land->planting_year }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                <span class="font-semibold">
                                    {{ $fertilization->amount_fertilized }}
                                </span>
                                KG
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                {{ date('d M Y', strtotime($fertilization->fertilization_date)) }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ $fertilization->user->name }}
                            </td>
                            <td class="whitespace-nowrap text-right text-sm font-medium">
                                <div class="relative inline-block text-left">
                                    <button class="text-gray-500 px-6 py-4 hover:text-gray-700 focus:outline-none"
                                        id="actionBtn{{ $fertilization->id }}"
                                        onclick="dropdownActions('{{ $fertilization->id }}')">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu mt-2 w-48 rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5"
                                        id="actionMenu{{ $fertilization->id }}">
                                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="#">
                                            <i class="fas fa-edit mr-2"></i> Edit
                                        </a>
                                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="#">
                                            <i class="fas fa-eye mr-2"></i> View
                                        </a>
                                        <a class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100" href="#"
                                            onclick="confirmDelete({{ $fertilization->id }})">
                                            <i class="fas fa-trash-alt mr-2"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($fertilizations->hasPages())
            <div class="mt-6 flex flex-col items-center justify-between sm:flex-row">
                <div class="mb-4 sm:mb-0">
                    <p class="text-sm text-gray-500">
                        {!! __('Showing') !!}
                        @if ($fertilizations->firstItem())
                            <span class="font-medium">{{ $fertilizations->firstItem() }}</span>
                            {!! __('to') !!}
                            <span class="font-medium">{{ $fertilizations->lastItem() }}</span>
                        @else
                            {{ $fertilizations->count() }}
                        @endif
                        {!! __('of') !!}
                        <span class="font-medium">{{ $fertilizations->total() }}</span>
                        {!! __('results') !!}
                    </p>
                </div>
                <div class="flex items-center">
                    {{-- Previous Page Link --}}
                    @if ($fertilizations->onFirstPage())
                        <button
                            class="rounded-md rounded-l-lg bg-gray-100 px-3 py-1 text-gray-700 hover:bg-gray-200 disabled:opacity-50"
                            disabled>
                            <i class="fas fa-chevron-left"></i>
                        </button>
                    @else
                        <a href="{{ $fertilizations->previousPageUrl() }}" rel="prev"
                            class="rounded-md rounded-l-lg bg-gray-100 px-3 py-1 text-gray-700 hover:bg-gray-200" disabled>
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5 dark:bg-gray-800 dark:border-gray-600">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $fertilizations->currentPage())
                                    <button class="bg-green-600 px-3 py-1 text-white hover:bg-green-700" disabled>
                                        {{ $page }}
                                    </button>
                                @else
                                    <a href="{{ $url }}" class="bg-gray-100 px-3 py-1 text-gray-700 hover:bg-gray-200" disabled:opacity-50>
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($fertilizations->hasMorePages())
                        <a href="{{ $fertilizations->nextPageUrl() }}"
                            class="rounded-md rounded-r-lg bg-gray-100 px-3 py-1 text-gray-700 hover:bg-gray-200">
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
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="fixed inset-0 z-50 hidden overflow-y-auto" id="deleteModal">
        <div class="flex min-h-screen items-center justify-center px-4 pb-20 pt-4 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:h-screen sm:align-middle" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block transform overflow-hidden rounded-lg bg-white text-left align-bottom shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:align-middle">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <i class="fas fa-exclamation-triangle text-red-600"></i>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">
                                Delete Product
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Are you sure you want to delete this product? This action cannot be undone.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button
                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm"
                        id="confirmDeleteBtn" type="button">
                        Delete
                    </button>
                    <button
                        class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 sm:ml-3 sm:mt-0 sm:w-auto sm:text-sm"
                        id="cancelDeleteBtn" type="button">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="fixed inset-0 z-50 overflow-y-auto" id="successModal">
            <div class="flex min-h-screen items-center justify-center px-4 pb-20 pt-4 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:h-screen sm:align-middle" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block transform overflow-hidden rounded-lg bg-white text-left align-bottom shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md sm:align-middle">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">
                                    Sukses!
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        {{ session('success') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const modal = document.getElementById('successModal');

                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 2000);
            });
        </script>
    @endif
@endsection

@section('scripts')
    <script>
        // Toggle action dropdowns
        function dropdownActions(id) {
            event.stopPropagation();

            // Close other action menus
            document.querySelectorAll('.dropdown-menu').forEach(el => {
                el.classList.remove('show');
            });

            document.getElementById('actionMenu' + id).classList.toggle('show');
        }

        // Delete confirmation modal
        function confirmDelete(id) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('confirmDeleteBtn').setAttribute('data-id', id);
        }

        document.getElementById('cancelDeleteBtn').addEventListener('click', function () {
            document.getElementById('deleteModal').classList.add('hidden');
        });

        document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
            var id = this.getAttribute('data-id');
            // Here you would normally make an AJAX request to delete the product
            alert('Product ' + id + ' would be deleted');
            document.getElementById('deleteModal').classList.add('hidden');
        });

        // Export data function
        function exportData(format) {
            alert('Exporting data as ' + format.toUpperCase());
            document.getElementById('exportMenu').classList.remove('show');
        }
    </script>
@endsection