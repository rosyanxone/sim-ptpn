@extends('layouts.users')

@section('title', 'Products')
@section('header', 'Products Management')

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
            <h2 class="mb-4 text-xl font-semibold text-gray-800 md:mb-0">Products List</h2>
            <div class="flex flex-col gap-3 sm:flex-row">
                <a class="inline-flex items-center justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 font-semibold text-white transition hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                    href="#">
                    <i class="fas fa-plus mr-2"></i> Add New Product
                </a>
                <div class="dropdown relative">
                    <button
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 font-semibold text-white transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        id="exportDropdown">
                        <i class="fas fa-download mr-2"></i> Export <i class="fas fa-chevron-down ml-2"></i>
                    </button>
                    <div class="dropdown-menu mt-2 w-48 rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5"
                        id="exportMenu">
                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="#"
                            onclick="exportData('csv')">Export as CSV</a>
                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="#"
                            onclick="exportData('excel')">Export as Excel</a>
                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="#"
                            onclick="exportData('pdf')">Export as PDF</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div class="flex w-full flex-col gap-3 sm:flex-row md:w-auto">
                <div class="relative">
                    <input
                        class="w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        id="search" type="text" placeholder="Search products...">
                    <button class="absolute right-0 top-0 mr-2 mt-2 text-gray-500">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <select
                    class="rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                    id="category-filter">
                    <option value="">All Categories</option>
                    <option value="oil-products">Oil Products</option>
                    <option value="biofuel">Biofuel</option>
                    <option value="cooking-oil">Cooking Oil</option>
                </select>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row">
                <select
                    class="rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                    id="sort-by">
                    <option value="name-asc">Name (A-Z)</option>
                    <option value="name-desc">Name (Z-A)</option>
                    <option value="price-asc">Price (Low to High)</option>
                    <option value="price-desc">Price (High to Low)</option>
                    <option value="stock-asc">Stock (Low to High)</option>
                    <option value="stock-desc">Stock (High to Low)</option>
                </select>
                <select
                    class="rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                    id="items-per-page">
                    <option value="10">10 per page</option>
                    <option value="25">25 per page</option>
                    <option value="50">50 per page</option>
                    <option value="100">100 per page</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            scope="col">
                            <div class="flex items-center">
                                <input
                                    class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                    id="select-all" type="checkbox">
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            scope="col">
                            <div class="flex items-center">
                                Product
                                <button class="ml-1 text-gray-400 hover:text-gray-500">
                                    <i class="fas fa-sort"></i>
                                </button>
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            scope="col">
                            <div class="flex items-center">
                                Category
                                <button class="ml-1 text-gray-400 hover:text-gray-500">
                                    <i class="fas fa-sort"></i>
                                </button>
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            scope="col">
                            <div class="flex items-center">
                                Price
                                <button class="ml-1 text-gray-400 hover:text-gray-500">
                                    <i class="fas fa-sort"></i>
                                </button>
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            scope="col">
                            <div class="flex items-center">
                                Stock
                                <button class="ml-1 text-gray-400 hover:text-gray-500">
                                    <i class="fas fa-sort"></i>
                                </button>
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            scope="col">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500"
                            scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @for ($i = 1; $i <= 10; $i++)
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4">
                                <input
                                    class="product-checkbox rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                    type="checkbox">
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 flex-shrink-0">
                                        <img class="h-10 w-10 rounded object-cover"
                                            src="https://images.unsplash.com/photo-1591315685611-fb7ece8c9b81?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                            alt="Product">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            @if ($i == 1)
                                                Crude Palm Oil
                                            @elseif ($i == 2)
                                                Palm Kernel Oil
                                            @elseif ($i == 3)
                                                Palm Biodiesel
                                            @elseif ($i == 4)
                                                Palm Olein
                                            @elseif ($i == 5)
                                                Palm Stearin
                                            @elseif ($i == 6)
                                                Palm Wax
                                            @elseif ($i == 7)
                                                Palm Fatty Acid
                                            @elseif ($i == 8)
                                                Palm Glycerin
                                            @elseif ($i == 9)
                                                Palm Soap Base
                                            @else
                                                Palm Oil Derivative #{{ $i }}
                                            @endif
                                        </div>
                                        <div class="text-sm text-gray-500">SKU: PALM-{{ 1000 + $i }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                @if ($i <= 3)
                                    Oil Products
                                @elseif ($i <= 6)
                                    Biofuel
                                @else
                                    Cooking Oil
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                ${{ 100 + $i * 10 }}/barrel
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                {{ 300 - $i * 30 }} barrels
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                @if (300 - $i * 30 > 100)
                                    <span
                                        class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">In
                                        Stock</span>
                                @elseif (300 - $i * 30 > 0)
                                    <span
                                        class="inline-flex rounded-full bg-yellow-100 px-2 text-xs font-semibold leading-5 text-yellow-800">Low
                                        Stock</span>
                                @else
                                    <span
                                        class="inline-flex rounded-full bg-red-100 px-2 text-xs font-semibold leading-5 text-red-800">Out
                                        of Stock</span>
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                <div class="relative inline-block text-left">
                                    <button class="text-gray-500 hover:text-gray-700 focus:outline-none"
                                        id="actionBtn{{ $i }}">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu mt-2 w-48 rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5"
                                        id="actionMenu{{ $i }}">
                                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                            href="#">
                                            <i class="fas fa-edit mr-2"></i> Edit
                                        </a>
                                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                            href="#">
                                            <i class="fas fa-eye mr-2"></i> View
                                        </a>
                                        <a class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100" href="#"
                                            onclick="confirmDelete({{ $i }})">
                                            <i class="fas fa-trash-alt mr-2"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex flex-col items-center justify-between sm:flex-row">
            <div class="mb-4 text-sm text-gray-500 sm:mb-0">
                Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span
                    class="font-medium">24</span> results
            </div>
            <div class="flex items-center">
                <button
                    class="rounded-md rounded-l-lg bg-gray-100 px-3 py-1 text-gray-700 hover:bg-gray-200 disabled:opacity-50"
                    disabled>
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="bg-green-600 px-3 py-1 text-white hover:bg-green-700">1</button>
                <button class="bg-gray-100 px-3 py-1 text-gray-700 hover:bg-gray-200">2</button>
                <button class="bg-gray-100 px-3 py-1 text-gray-700 hover:bg-gray-200">3</button>
                <button class="rounded-md rounded-r-lg bg-gray-100 px-3 py-1 text-gray-700 hover:bg-gray-200">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
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
@endsection

@section('scripts')
    <script>
        // Toggle export dropdown
        document.getElementById('exportDropdown').addEventListener('click', function() {
            document.getElementById('exportMenu').classList.toggle('show');
        });

        // Close export dropdown when clicking outside
        window.addEventListener('click', function(event) {
            if (!event.target.matches('#exportDropdown') && !event.target.closest('#exportDropdown')) {
                var dropdowns = document.getElementsByClassName('dropdown-menu');
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        });

        // Toggle action dropdowns
        for (let i = 1; i <= 10; i++) {
            document.getElementById('actionBtn' + i).addEventListener('click', function(event) {
                event.stopPropagation();
                document.getElementById('actionMenu' + i).classList.toggle('show');

                // Close other action menus
                for (let j = 1; j <= 10; j++) {
                    if (j !== i) {
                        document.getElementById('actionMenu' + j).classList.remove('show');
                    }
                }
            });
        }

        // Select all checkbox
        document.getElementById('select-all').addEventListener('change', function() {
            var checkboxes = document.getElementsByClassName('product-checkbox');
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        });

        // Delete confirmation modal
        function confirmDelete(id) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('confirmDeleteBtn').setAttribute('data-id', id);
        }

        document.getElementById('cancelDeleteBtn').addEventListener('click', function() {
            document.getElementById('deleteModal').classList.add('hidden');
        });

        document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
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
