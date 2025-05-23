@extends('layouts.app')

@section('title', 'Login - PalmEco')

@section('content')
    <div class="flex min-h-[90vh] items-center justify-center bg-gray-100 py-16 md:py-0">
        <div class="container mx-auto my-auto px-4">
            <div class="mx-auto max-w-md overflow-hidden rounded-lg shadow-lg">
                <div class="bg-green-700 px-6 py-4">
                    <h2 class="text-center text-2xl font-bold text-white">Login ke SIM PTPN</h2>
                </div>

                <div class="p-6">
                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="mb-4 rounded border border-green-400 bg-green-100 px-4 py-3 text-green-700">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="mb-4 rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700">
                            <ul class="list-inside list-disc">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.store') }}">
                        @csrf

                        @if (session('error'))
                            <span class="text-red-500">
                                {{ session('error') }}
                            </span>
                        @endif

                        @if ($errors->any())
                            <div class="text-red-500">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Email Address -->
                        <div class="mb-4">
                            <label class="mb-2 block font-bold text-gray-700" for="email">Email</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </span>
                                <input
                                    class="w-full rounded-md border border-gray-300 px-3 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-green-600"
                                    id="email" name="email" type="email" value="{{ old('email') }}" required
                                    autofocus placeholder="your@email.com">
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label class="mb-2 block font-bold text-gray-700" for="password">Password</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </span>
                                <input
                                    class="w-full rounded-md border border-gray-300 px-3 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-green-600"
                                    id="password" name="password" type="password" required placeholder="••••••••">
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-4 flex items-center">
                            <input
                                class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                id="remember_me" name="remember" type="checkbox">
                            <label class="ml-2 text-sm text-gray-600" for="remember_me">Remember me</label>
                        </div>

                        <div class="mb-6 flex items-center justify-between">
                            <a class="text-sm text-green-600 hover:text-green-800" href="#">
                                Forgot your password?
                            </a>

                            <button
                                class="cursor-pointer rounded bg-green-600 px-4 py-2 font-bold text-white transition duration-300 hover:bg-green-700"
                                type="submit">
                                Login
                            </button>
                        </div>
                    </form>

                    <div class="border-t border-gray-200 pt-4">
                        <p class="mb-4 text-center text-sm text-gray-600">Atau</p>
                        <div class="flex justify-center space-x-4">
                            <a class="h-10 w-10 rounded-full bg-blue-600 px-3.5 py-2 text-white transition duration-300 hover:bg-blue-700"
                                href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="h-10 w-10 rounded-full bg-blue-400 px-3 py-2 text-white transition duration-300 hover:bg-blue-500"
                                href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="h-10 w-10 rounded-full bg-red-600 px-3 py-2 text-white transition duration-300 hover:bg-red-700"
                                href="#">
                                <i class="fab fa-google"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
