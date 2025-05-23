@extends('layouts.users')

@section('title', 'Tambah Penyemprotan')
@section('header', 'Tambah Penyemprotan')

@section('content')
    <div class="rounded-lg bg-white p-6 shadow-md">
        <div class="mb-6">
            <a class="inline-flex items-center text-sm text-green-600 hover:text-green-800"
                href="{{ route('spraying.index') }}">
                <i class="fas fa-arrow-left mr-2"></i> Daftar Penyemprotan
            </a>
        </div>

        <form action="{{ route('spraying.store') }}" method="POST" novalidate>
            @csrf
            <div class="grid w-full grid-cols-1 gap-2 md:grid-cols-2">
                <div class="md:col-span-2">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Lahan</h3>
                </div>

                <div class="col-span-1 grid grid-cols-1 gap-6 md:col-span-2 md:grid-cols-2">
                    <!-- Area Lahan -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700" for="land-area">Area Lahan <span
                                class="text-red-600">*</span></label>
                        <input
                            class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                            id="land-area" name="land_area" type="text" required>
                        @error('land_area')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Lokasi Lahan -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700" for="land-location">
                            Lokasi Lahan <span class="text-red-600">*</span>
                        </label>
                        <select
                            class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                            id="land-location" name="land_location" required>
                            <option value="" selected disabled>Pilih lokasi lahan...</option>
                            <option value="Afdeling 1">Afdeling 1</option>
                            <option value="Afdeling 2">Afdeling 2</option>
                            <option value="Afdeling 3">Afdeling 3</option>
                            <option value="Afdeling 4">Afdeling 4</option>
                            <option value="Afdeling 5">Afdeling 5</option>
                        </select>
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
                                id="planting-year" name="planting_year" type="number" step="0.01" min="0"
                                required>
                        </div>
                        @error('planting_year')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="md:col-span-2">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Penyemprotan</h3>
                </div>

                <div class="col-span-1 grid grid-cols-1 gap-6 md:col-span-2 md:grid-cols-2">
                    <!-- Jumlah Penyemprotan -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700" for="amount-spraying">
                            Jumlah Penyemprotan <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input
                                class="w-full rounded-md border border-gray-300 px-3 py-2 pr-7 focus:outline-none focus:ring-2 focus:ring-green-500"
                                id="amount-spraying" name="amount_spraying" type="number" required>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                <span class="font-medium text-gray-500">L</span>
                            </div>
                        </div>
                        @error('amount_spraying')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Penyemprotan -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700" for="spraying-date">
                            Tanggal Penyemprotan <span class="text-red-600">*</span>
                        </label>
                        <input
                            class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                            id="spraying-date" name="spraying_date" type="date">
                        @error('spraying_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700" for="pesticide-stock-id">
                            Jenis Pestisida <span class="text-red-600">*</span></label>
                        <div class="w-full rounded-md border border-gray-300 pr-2">
                            <select
                                class="w-full cursor-pointer rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                                id="pesticide-stock-id" name="pesticide_stock_id" required>
                                <option value="" selected disabled>Pilih jenis pestisida...</option>
                                @foreach ($pesticideStocks as $pesticideStock)
                                    <option value="{{ $pesticideStock->id }}">{{ $pesticideStock->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('pesticide_stock_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mt-2 flex justify-end space-x-3 md:col-span-2">
                    <a class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                        href="{{ route('spraying.index') }}">
                        Batalkan
                    </a>
                    <button
                        class="rounded-md border border-transparent bg-green-600 px-4 py-2 font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                        type="submit">
                        Tambah Penyemprotan
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
