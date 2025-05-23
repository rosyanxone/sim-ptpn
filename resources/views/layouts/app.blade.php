<!DOCTYPE html>
<html class="scroll-smooth" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PTPN - @yield('title', 'Welcome')</title>
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Image Icon -->
    <link rel="shortcut icon" href="{{ asset('./images/logo.jpeg') }}" type="image/x-icon">
    <style>
        .hero-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1591315685611-fb7ece8c9b81?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">
    <!-- Header -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto flex items-center justify-between px-4 py-4">
            <div class="flex items-center">
                <img class="h-10 w-auto" src="{{ asset('./images/logo.jpeg') }}" alt="Logo">
                <a class="ml-3 text-xl font-bold text-green-800" href="{{ route('home') }}">PTPN IV Regional 5</a>
            </div>
            <nav class="hidden items-center space-x-8 md:flex">
                <a class="text-green-700 hover:text-green-500" href="#home">Home</a>
                <a class="text-green-700 hover:text-green-500" href="#about">Tentang</a>
                <a class="text-green-700 hover:text-green-500" href="#gallery">Galeri</a>
                <a class="text-green-700 hover:text-green-500" href="#products">Produk</a>
                <a class="text-green-700 hover:text-green-500" href="#contact">Kontak</a>
                <a class="rounded-lg border border-green-600 bg-transparent px-6 py-2 font-bold text-green-700 transition duration-300 hover:bg-green-700 hover:text-white"
                    href="{{ route('login') }}">
                    Log In
                </a>
            </nav>
            <button class="cursor-pointer focus:outline-none md:hidden">
                <i class="fas fa-bars text-2xl text-green-700"></i>
            </button>
        </div>
        <!-- Mobile Menu -->
        <div class="hidden w-full bg-white px-4 py-2 md:hidden" id="mobile-menu">
            <a class="block py-2 text-green-700 hover:text-green-500" href="#home">Home</a>
            <a class="block py-2 text-green-700 hover:text-green-500" href="#about">Tentang</a>
            <a class="block py-2 text-green-700 hover:text-green-500" href="#gallery">Galeri</a>
            <a class="block py-2 text-green-700 hover:text-green-500" href="#products">Produk</a>
            <a class="block py-2 text-green-700 hover:text-green-500" href="#contact">Kontak</a>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-green-900 py-10 text-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <div>
                    <h3 class="mb-4 text-xl font-bold">PT Perusahaan Nusantara IV Regional 5</h3>
                    <p class="mb-4">Tumbuh, Juara, Bangun Negeri.</p>
                    <div class="flex space-x-4">
                        <a class="text-white hover:text-green-300" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="text-white hover:text-green-300" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="text-white hover:text-green-300" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="text-white hover:text-green-300" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div>
                    <h3 class="mb-4 text-xl font-bold">Links</h3>
                    <ul class="space-y-2">
                        <li><a class="hover:text-green-300" href="#home">Home</a></li>
                        <li><a class="hover:text-green-300" href="#about">Tentang</a></li>
                        <li><a class="hover:text-green-300" href="#gallery">Galeri</a></li>
                        <li><a class="hover:text-green-300" href="#products">Produk</a></li>
                        <li><a class="hover:text-green-300" href="#contact">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 text-xl font-bold">Kontak</h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mr-2 mt-1"></i>
                            <span>Jl. Slt. Abdurrahman No.11, Sungai Bangkong, Kec. Pontianak Kota, Kota Pontianak, Kalimantan Barat 78113</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-2"></i>
                            <span>(0561) 749367</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            <span>ptpnusantara4@ptpn4.co</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock mr-2"></i>
                            <span>Senin - Jumat: 09:00 - 17:00</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 border-t border-green-700 pt-6 text-center">
                <p>&copy; {{ date('Y') }} PT Perusahaan Nusantara. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.querySelector('button.md\\:hidden').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>
