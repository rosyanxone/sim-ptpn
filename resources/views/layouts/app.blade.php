<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palm Oil Company - @yield('title', 'Welcome')</title>
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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
                <img class="h-10 w-auto" src="https://via.placeholder.com/50" alt="Logo">
                <span class="ml-3 text-xl font-bold text-green-800">PalmEco</span>
            </div>
            <nav class="hidden space-x-8 md:flex">
                <a class="text-green-700 hover:text-green-500" href="#home">Home</a>
                <a class="text-green-700 hover:text-green-500" href="#about">About Us</a>
                <a class="text-green-700 hover:text-green-500" href="#gallery">Gallery</a>
                <a class="text-green-700 hover:text-green-500" href="#products">Products</a>
                <a class="text-green-700 hover:text-green-500" href="#contact">Contact</a>
            </nav>
            <button class="focus:outline-none md:hidden">
                <i class="fas fa-bars text-2xl text-green-700"></i>
            </button>
        </div>
        <!-- Mobile Menu -->
        <div class="hidden w-full bg-white px-4 py-2 md:hidden" id="mobile-menu">
            <a class="block py-2 text-green-700 hover:text-green-500" href="#home">Home</a>
            <a class="block py-2 text-green-700 hover:text-green-500" href="#about">About Us</a>
            <a class="block py-2 text-green-700 hover:text-green-500" href="#gallery">Gallery</a>
            <a class="block py-2 text-green-700 hover:text-green-500" href="#products">Products</a>
            <a class="block py-2 text-green-700 hover:text-green-500" href="#contact">Contact</a>
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
                    <h3 class="mb-4 text-xl font-bold">PalmEco</h3>
                    <p class="mb-4">Sustainable palm oil production for a greener future.</p>
                    <div class="flex space-x-4">
                        <a class="text-white hover:text-green-300" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="text-white hover:text-green-300" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="text-white hover:text-green-300" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="text-white hover:text-green-300" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div>
                    <h3 class="mb-4 text-xl font-bold">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a class="hover:text-green-300" href="#home">Home</a></li>
                        <li><a class="hover:text-green-300" href="#about">About Us</a></li>
                        <li><a class="hover:text-green-300" href="#gallery">Gallery</a></li>
                        <li><a class="hover:text-green-300" href="#products">Products</a></li>
                        <li><a class="hover:text-green-300" href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 text-xl font-bold">Contact Us</h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mr-2 mt-1"></i>
                            <span>123 Palm Avenue, Green City, Country</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-2"></i>
                            <span>+1 234 567 890</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            <span>info@palmeco.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 border-t border-green-700 pt-6 text-center">
                <p>&copy; {{ date('Y') }} PalmEco. All rights reserved.</p>
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
