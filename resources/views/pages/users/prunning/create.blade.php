@extends('layouts.users')

@section('title', 'Tambah Pembabatan')
@section('header', 'Tambah Pembabatan')

@section('content')
    <div class="rounded-lg bg-white p-6 shadow-md">
        <div class="mb-6">
            <a class="inline-flex items-center text-sm text-green-600 hover:text-green-800"
                href="{{ route('prunning.index') }}">
                <i class="fas fa-arrow-left mr-2"></i> Daftar Pembabatan
            </a>
        </div>

        <form action="{{ route('prunning.store') }}" method="POST">
            @csrf
            <div class="grid w-full grid-cols-1 gap-2 md:grid-cols-2">
                <div class="md:col-span-2">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Tanah</h3>
                </div>

                <div class="col-span-1 grid grid-cols-1 gap-6 md:col-span-2 md:grid-cols-2">
                    <!-- Area Tanah -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700" for="land-area">
                            Area Tanah <span class="text-red-600">*</span>
                        </label>
                        <input
                            class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                            id="land-area" name="land_area" type="text" required>
                        @error('land_area')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Lokasi Tanah -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700" for="land-location">
                            Lokasi Tanah <span class="text-red-600">*</span>
                        </label>
                        <input
                            class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                            id="land-location" name="land_location" type="text" required>
                        @error('land_location')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tahun Tanam -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700" for="planting-year">
                            Tahun Tanam <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input
                                class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                                id="planting-year" name="planting_year" type="number" step="0.01" min="0" required>
                        </div>
                        @error('planting_year')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="md:col-span-2">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Pembabatan</h3>
                </div>

                <div class="col-span-1 grid grid-cols-1 gap-6 md:col-span-2 md:grid-cols-2">
                    <!-- Jumlah Pembabatan -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700" for="prunning-amount">
                            Jumlah Pembabatan <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input
                                class="w-full rounded-md border border-gray-300 px-3 py-2 pr-7 focus:outline-none focus:ring-2 focus:ring-green-500"
                                id="prunning-amount" name="prunning_amount" type="number" required>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                <span class="font-medium text-gray-500">Ha</span>
                            </div>
                        </div>
                        @error('prunning_amount')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Pembabatan -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700" for="prunning-date">
                            Tanggal Pembabatan <span class="text-red-600">*</span>
                        </label>
                        <input
                            class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                            id="prunning-date" name="prunning_date" type="date">
                        @error('prunning_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Area Pembabatan -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700" for="prunning-area">
                            Area Pembabatan <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input
                                class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                                id="prunning-area" name="prunning_area" type="text" required>
                        </div>
                        @error('prunning_area')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mt-2 flex justify-end space-x-3 md:col-span-2">
                    <a class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                        href="{{ route('prunning.index') }}">
                        Batalkan
                    </a>
                    <button
                        class="rounded-md border border-transparent bg-green-600 px-4 py-2 font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                        type="submit">
                        Tambah Pemupukan
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection