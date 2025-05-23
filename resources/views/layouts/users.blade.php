<!DOCTYPE html>
<html class="scroll-smooth" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - SIM PTPN</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Image Icon -->
    <link rel="shortcut icon" href="{{ asset('./images/logo.jpeg') }}" type="image/x-icon">
    <!-- Custom Styles -->
    <style>
        .sidebar-active {
            background-color: rgba(0, 0, 0, 0.1);
            border-left: 4px solid #16a34a;
        }
    </style>
    <!-- Initial CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Additional Styles -->
    @yield('styles')
</head>

<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex w-64 flex-col bg-green-800 text-white">
                <div class="flex h-16 items-center justify-center bg-green-900">
                    <span class="text-xl font-bold">SIM PTPN</span>
                </div>
                <div class="flex flex-grow flex-col overflow-y-auto">
                    <nav class="flex-1 space-y-1 px-2 py-4">
                        <a class="{{ request()->routeIs('dashboard') ? 'sidebar-active' : '' }} flex items-center rounded-md px-4 py-2 text-white hover:bg-green-700"
                            href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            Dashboard
                        </a>
                        <a class="{{ request()->routeIs('fertilization*') ? 'sidebar-active' : '' }} flex items-center rounded-md px-4 py-2 text-white hover:bg-green-700"
                            href="{{ route('fertilization.index') }}">
                            <i class="fa-solid fa-cloud mr-3"></i>
                            Pemupukan
                        </a>
                        <a class="{{ request()->routeIs('spraying*') ? 'sidebar-active' : '' }} flex items-center rounded-md px-4 py-2 text-white hover:bg-green-700"
                            href="{{ route('spraying.index') }}">
                            <i class="fa-solid fa-spray-can-sparkles mr-3"></i>
                            Penyemprotan
                        </a>
                        <a class="{{ request()->routeIs('prunning*') ? 'sidebar-active' : '' }} flex items-center rounded-md px-4 py-2 text-white hover:bg-green-700"
                            href="{{ route('prunning.index') }}">
                            <i class="fa-solid fa-tree mr-3"></i>
                            Pembabatan
                        </a>
                        @role('admin')
                            <a class="{{ request()->routeIs('user*') ? 'sidebar-active' : '' }} flex items-center rounded-md px-4 py-2 text-white hover:bg-green-700"
                                href="{{ route('user.index') }}">
                                <i class="fas fa-users mr-3"></i>
                                User
                            </a>
                        @endrole
                    </nav>
                    <div class="border-t border-green-700 p-4">
                        <div class="flex items-center">
                            <div class="ml-3">
                                <p class="text-sm font-medium">{{ auth()->user()->name }}</p>
                                <div class="flex items-center">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="text-xs text-green-300 hover:text-white"
                                            type="submit">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-1 flex-col overflow-hidden">
            <!-- Top Navbar -->
            <header class="border-b bg-white shadow-md">
                <div class="flex h-16 items-center justify-between px-6">
                    <div class="flex items-center">
                        <button class="text-gray-500 focus:outline-none md:hidden" id="sidebarToggle">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h1 class="ml-4 text-xl font-bold text-gray-800">@yield('header', 'Dashboard')</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="relative text-gray-500 hover:text-gray-700 focus:outline-none">
                            <i class="fas fa-bell"></i>
                            <span class="absolute right-0 top-0 inline-block h-2 w-2 rounded-full bg-red-500"></span>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Mobile Sidebar -->
            <div class="fixed inset-0 z-40 flex hidden md:hidden" id="mobileSidebar">
                <div class="fixed inset-0 bg-gray-600 bg-opacity-75" id="sidebarOverlay"></div>
                <div class="relative flex w-full max-w-xs flex-1 flex-col bg-green-800">
                    <div class="absolute right-0 top-0 -mr-12 pt-2">
                        <button
                            class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            id="closeSidebar">
                            <span class="sr-only">Close sidebar</span>
                            <i class="fas fa-times text-white"></i>
                        </button>
                    </div>
                    <div class="flex h-16 items-center justify-center bg-green-900">
                        <span class="text-xl font-bold text-white">SIM PTPN</span>
                    </div>
                    <div class="mt-5 h-0 flex-1 overflow-y-auto">
                        <nav class="space-y-1 px-2">
                            <a class="{{ request()->routeIs('dashboard') ? 'sidebar-active' : '' }} flex items-center rounded-md px-4 py-2 text-white hover:bg-green-700"
                                href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt mr-3"></i>
                                Dashboard
                            </a>
                            <a class="{{ request()->routeIs('fertilization*') ? 'sidebar-active' : '' }} flex items-center rounded-md px-4 py-2 text-white hover:bg-green-700"
                                href="{{ route('fertilization.index') }}">
                                <i class="fa-solid fa-cloud mr-3"></i>
                                Pemupukan
                            </a>
                            <a class="{{ request()->routeIs('spraying*') ? 'sidebar-active' : '' }} flex items-center rounded-md px-4 py-2 text-white hover:bg-green-700"
                                href="{{ route('spraying.index') }}">
                                <i class="fa-solid fa-spray-can-sparkles mr-3"></i>
                                Penyemprotan
                            </a>
                            <a class="{{ request()->routeIs('prunning*') ? 'sidebar-active' : '' }} flex items-center rounded-md px-4 py-2 text-white hover:bg-green-700"
                                href="{{ route('prunning.index') }}">
                                <i class="fas fa-users mr-3"></i>
                                Pembabatan
                            </a>
                            @role('admin')
                                <a class="{{ request()->routeIs('user*') ? 'sidebar-active' : '' }} flex items-center rounded-md px-4 py-2 text-white hover:bg-green-700"
                                    href="{{ route('user.index') }}">
                                    <i class="fas fa-images mr-3"></i>
                                    User
                                </a>
                            @endrole
                        </nav>
                    </div>
                    <div class="border-t border-green-700 p-4">
                        <div class="flex items-center">
                            <div class="ml-3">
                                <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>
                                <div class="flex items-center">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="text-xs text-green-300 hover:text-white"
                                            type="submit">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-gray-100 p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Mobile sidebar toggle
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('mobileSidebar').classList.remove('hidden');
        });

        document.getElementById('closeSidebar').addEventListener('click', function() {
            document.getElementById('mobileSidebar').classList.add('hidden');
        });

        document.getElementById('sidebarOverlay').addEventListener('click', function() {
            document.getElementById('mobileSidebar').classList.add('hidden');
        });
    </script>

    @yield('scripts')
</body>

</html>
