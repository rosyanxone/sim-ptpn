@extends('layouts.users')

@section('title', 'Penyemprotan')
@section('header', 'Kelola Penyemprotan')

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
            <h2 class="mb-4 text-xl font-semibold text-gray-800 md:mb-0">Daftar Penyemprotan</h2>
            <div class="flex flex-col gap-3 sm:flex-row">
            </div>
        </div>

        <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <form class="flex w-full flex-col gap-3 sm:flex-row md:w-auto" action="{{ route('spraying.index') }}"
                method="GET">
                <div class="relative">
                    <input
                        class="w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        id="search" name="search" type="text" value="{{ request()->get('search') }}"
                        placeholder="Cari penyemprotan...">
                    <button class="absolute right-0 top-0 mr-2 mt-2 text-gray-500">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <label class="rounded-md border border-gray-300 pr-2" for="sort-by">
                    <select
                        class="w-full rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 md:w-fit"
                        id="sort-by" name="sortBy" onchange="this.form.submit()">
                        <option value="spraying_date" @selected(request()->get('sortBy') == 'spraying_date')>Tanggal Penyemprotan</option>
                        <option value="amount_spraying" @selected(request()->get('sortBy') == 'amount_spraying')>Jumlah Penyemprotan</option>
                    </select>
                </label>
            </form>
            <div class="flex flex-col gap-3 sm:flex-row">
                @role('admin|krani')
                    <a class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 font-semibold text-white transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        href="{{ route('spraying.create') }}">
                        <i class="fas fa-plus mr-2"></i> Tambah Penyemprotan
                    </a>
                @endrole
                <a class="inline-flex items-center justify-center rounded-md border border-transparent bg-yellow-600 px-4 py-2 font-semibold text-white transition hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2"
                    href="{{ route('spraying.stock.index') }}">
                    <i class="fa-solid fa-layer-group mr-2"></i> Perbarui Pestisida
                </a>
                <div class="dropdown relative">
                    <a class="inline-flex items-center justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 font-semibold text-white transition hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                        id="exportDropdown" href="{{ route('spraying.export') }}">
                        <i class="fa-solid fa-file-csv mr-2"></i> Export
                    </a>
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
                                Lahan
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
                                Jumlah Penyemprotan
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            scope="col">
                            <div class="flex items-center">
                                Tanggal Penyemprotan
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
                    @foreach ($sprayings as $spraying)
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $spraying->land ? $spraying->land->land_area : '' }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $spraying->land ? $spraying->land->land_location : '' }}
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                {{ $spraying->land ? $spraying->land->planting_year : '' }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                <span class="font-semibold">
                                    {{ $spraying->amount_spraying }} Liter
                                </span>
                                <div class="text-sm text-gray-500">
                                    {{ $spraying->pesticide->name }}
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                {{ date('d M Y', strtotime($spraying->spraying_date)) }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ $spraying->user->name }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                @role('admin|krani')
                                    <div class="relative inline-block text-left">
                                        <button class="text-gray-500 hover:text-gray-700 focus:outline-none"
                                            id="actionBtn{{ $spraying->id }}"
                                            onclick="dropdownActions('{{ $spraying->id }}')">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu mt-2 w-48 rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5"
                                            id="actionMenu{{ $spraying->id }}">
                                            <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                href="{{ route('spraying.edit', ['spraying' => $spraying->id]) }}">
                                                <i class="fas fa-edit mr-2"></i> Edit
                                            </a>
                                            <form action="{{ route('spraying.destroy', ['spraying' => $spraying->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="block w-full px-4 py-2 text-start text-sm text-red-600 hover:bg-gray-100"
                                                    type="submit">
                                                    <i class="fas fa-trash-alt mr-2"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endrole
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $sprayings->links('components.pagination') }}
    </div>

    @include('components.delete-confirmation-popup')
    @include('components.success-popup')
@endsection

@section('scripts')
    <script>
        function handleClickOutside(event) {
            document.querySelectorAll('.dropdown-menu').forEach(el => {
                el.classList.remove('show');
            });
        }

        // Add event listener
        document.addEventListener('click', handleClickOutside);

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
