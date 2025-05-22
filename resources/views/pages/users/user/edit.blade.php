@extends('layouts.users')

@section('title', 'Edit User')
@section('header', 'Edit User')

@section('content')
    <div class="rounded-lg bg-white p-6 shadow-md">
        <div class="mb-6">
            <a class="inline-flex items-center text-sm text-green-600 hover:text-green-800"
                href="{{ route('user.index') }}">
                <i class="fas fa-arrow-left mr-2"></i> Daftar User
            </a>
        </div>

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid w-full grid-cols-1 gap-2 md:grid-cols-2">
                <div class="md:col-span-2">
                    <h3 class="text-lg font-medium text-gray-900">Informasi User</h3>
                    <p class="mt-1 text-sm text-gray-600">Edit informasi user yang diperlukan</p>
                </div>

                <div class="col-span-1 grid grid-cols-1 gap-6 md:col-span-2 md:grid-cols-2">
                    <!-- Nama -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700" for="name">
                            Nama <span class="text-red-600">*</span>
                        </label>
                        <input
                            class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                            id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700" for="email">
                            Email <span class="text-red-600">*</span>
                        </label>
                        <input
                            class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                            id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Role -->
                    <div class="md:col-span-2">
                        <label class="mb-1 block text-sm font-medium text-gray-700" for="role">
                            Role <span class="text-red-600">*</span>
                        </label>
                        <select
                            class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                            id="role" name="role" required>
                            <option value="" disabled>Pilih Role</option>
                            <option disabled value="admin" {{ old('role', $user->roles->first()->name) == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>
                            <option value="krani" {{ old('role', $user->roles->first()->name) == 'krani' ? 'selected' : '' }}>
                                Krani
                            </option>
                            <option value="assistant" {{ old('role', $user->roles->first()->name) == 'assistant' ? 'selected' : '' }}>
                                Asisten
                            </option>
                            <option value="manager" {{ old('role', $user->roles->first()->name) == 'manager' ? 'selected' : '' }}>
                                Manejer
                            </option>
                        </select>
                        @error('role')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Password Section -->
                <div class="md:col-span-2">
                    <h3 class="text-lg font-medium text-gray-900 mt-6">Ubah Password</h3>
                    <p class="mt-1 text-sm text-gray-600">Kosongkan jika tidak ingin mengubah password</p>
                </div>

                <div class="col-span-1 grid grid-cols-1 gap-6 md:col-span-2 md:grid-cols-2">
                    <!-- Password Baru -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700" for="password">
                            Password Baru
                        </label>
                        <div class="relative">
                            <input
                                class="w-full rounded-md border border-gray-300 px-3 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-green-500"
                                id="password" name="password" type="password" placeholder="Kosongkan jika tidak diubah">
                            <button type="button" onclick="togglePassword('password')"
                                class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <i class="fas fa-eye text-gray-400" id="password-icon"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Konfirmasi Password Baru -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700" for="password-confirmation">
                            Konfirmasi Password Baru
                        </label>
                        <div class="relative">
                            <input
                                class="w-full rounded-md border border-gray-300 px-3 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-green-500"
                                id="password-confirmation" name="password_confirmation" type="password"
                                placeholder="Kosongkan jika tidak diubah">
                            <button type="button" onclick="togglePassword('password-confirmation')"
                                class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <i class="fas fa-eye text-gray-400" id="password-confirmation-icon"></i>
                            </button>
                        </div>
                        @error('password_confirmation')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Info User -->
                <div class="md:col-span-2 mt-4 p-4 bg-gray-50 rounded-md">
                    <h4 class="text-sm font-medium text-gray-900 mb-2">Informasi Tambahan</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-gray-600">
                        <div>
                            <span class="font-medium">Dibuat:</span><br>
                            {{ $user->created_at ? $user->created_at->format('d/m/Y H:i') : '-' }}
                        </div>
                        <div>
                            <span class="font-medium">Terakhir Diupdate:</span><br>
                            {{ $user->updated_at ? $user->updated_at->format('d/m/Y H:i') : '-' }}
                        </div>
                        <div>
                            <span class="font-medium">Status:</span><br>
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->is_active ?? true ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $user->is_active ?? true ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mt-6 flex justify-end space-x-3 md:col-span-2">
                    <a class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                        href="{{ route('user.index') }}">
                        Batalkan
                    </a>
                    <button
                        class="rounded-md border border-transparent bg-green-600 px-4 py-2 font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                        type="submit">
                        Update User
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(fieldId + '-icon');

            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
@endsection