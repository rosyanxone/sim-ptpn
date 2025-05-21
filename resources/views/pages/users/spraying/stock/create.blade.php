@extends('layouts.users')

@section('title', 'Penyemprotan')
@section('header', 'Kelola Penyemprotan')

@section('content')
    <div class="rounded-lg bg-white p-6 shadow-md">
        <div class="mb-6">
            <a class="inline-flex items-center text-sm text-green-600 hover:text-green-800"
                href="{{ route('spraying.stock.index') }}">
                <i class="fas fa-arrow-left mr-2"></i> Perbarui Pestisida
            </a>
        </div>

        <form action="{{ route('spraying.stock.store') }}" novalidate method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid w-full grid-cols-1 gap-2 md:grid-cols-2">
                <div class="md:col-span-2">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Pestisida</h3>
                </div>

                <div class="col-span-1 grid grid-cols-1 gap-6 md:col-span-2 md:grid-cols-2">
                    <!-- Nama/Jenis -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700" for="pesticide-name">
                            Nama/Jenis <spanclass="text-red-600">*</span></label>
                        <input
                            class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                            id="pesticide-name" name="pesticide_name" type="text" required>
                        @error('pesticide_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jumlah Stok -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700" for="pesticide-stock">
                            Jumlah Stok <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input
                                class="w-full rounded-md border border-gray-300 px-3 py-2 pr-7 focus:outline-none focus:ring-2 focus:ring-green-500"
                                id="pesticide-stock" name="pesticide_stock" type="number" required>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                <span class="font-medium text-gray-500">L</span>
                            </div>
                        </div>
                        @error('pesticide_stock')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mt-2 flex justify-end space-x-3 md:col-span-2">
                    <a class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                        href="{{ route('spraying.stock.index') }}">
                        Batalkan
                    </a>
                    <button
                        class="rounded-md border border-transparent bg-green-600 px-4 py-2 font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                        type="submit">
                        Tambah Pestisida
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
