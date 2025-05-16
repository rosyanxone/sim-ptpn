@extends('layouts.app')

@section('title', 'Welcome to PalmEco')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section py-32 text-white" id="home">
        <div class="container mx-auto px-4 text-center">
            <h1 class="mb-4 text-4xl font-bold md:text-6xl">Sustainable Palm Oil for a Better Tomorrow</h1>
            <p class="mb-8 text-xl md:text-2xl">Eco-friendly practices, premium quality products</p>
            <div class="flex flex-col justify-center gap-4 sm:flex-row">
                <a class="rounded-lg bg-green-600 px-6 py-3 font-bold text-white transition duration-300 hover:bg-green-700"
                    href="#products">
                    Our Products
                </a>
                <a class="rounded-lg border-2 border-white bg-transparent px-6 py-3 font-bold text-white transition duration-300 hover:bg-white hover:text-green-700"
                    href="#contact">
                    Contact Us
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="bg-white py-16" id="about">
        <div class="container mx-auto px-4">
            <div class="mb-12 text-center">
                <h2 class="mb-2 text-3xl font-bold text-green-800 md:text-4xl">About PalmEco</h2>
                <div class="mx-auto h-1 w-20 bg-green-600"></div>
            </div>
            <div class="grid grid-cols-1 items-center gap-8 md:grid-cols-2">
                <div>
                    <img class="h-auto w-full rounded-lg shadow-lg"
                        src="https://images.unsplash.com/photo-1591543620767-582b2e76369e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Palm Oil Plantation">
                </div>
                <div>
                    <h3 class="mb-4 text-2xl font-bold text-green-700">Our Story</h3>
                    <p class="mb-4 text-gray-700">
                        Founded in 2005 by John Palmerson, PalmEco has been at the forefront of sustainable palm oil
                        production.
                        What started as a small family business has grown into one of the region's leading palm oil
                        producers,
                        without compromising our commitment to environmental responsibility.
                    </p>
                    <h3 class="mb-4 text-2xl font-bold text-green-700">Our Mission</h3>
                    <p class="mb-4 text-gray-700">
                        At PalmEco, we believe that palm oil production can coexist with environmental conservation.
                        Our mission is to produce high-quality palm oil products while maintaining the highest standards
                        of sustainability and ethical practices.
                    </p>
                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <div class="rounded-lg bg-green-50 p-4">
                            <i class="fas fa-leaf mb-2 text-3xl text-green-600"></i>
                            <h4 class="font-bold text-green-700">Sustainable Farming</h4>
                        </div>
                        <div class="rounded-lg bg-green-50 p-4">
                            <i class="fas fa-recycle mb-2 text-3xl text-green-600"></i>
                            <h4 class="font-bold text-green-700">Zero Waste</h4>
                        </div>
                        <div class="rounded-lg bg-green-50 p-4">
                            <i class="fas fa-handshake mb-2 text-3xl text-green-600"></i>
                            <h4 class="font-bold text-green-700">Fair Trade</h4>
                        </div>
                        <div class="rounded-lg bg-green-50 p-4">
                            <i class="fas fa-certificate mb-2 text-3xl text-green-600"></i>
                            <h4 class="font-bold text-green-700">Certified Quality</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="bg-gray-100 py-16" id="gallery">
        <div class="container mx-auto px-4">
            <div class="mb-12 text-center">
                <h2 class="mb-2 text-3xl font-bold text-green-800 md:text-4xl">Our Gallery</h2>
                <div class="mx-auto h-1 w-20 bg-green-600"></div>
                <p class="mt-4 text-gray-600">Take a look at our plantations and production facilities</p>
            </div>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img class="h-64 w-full object-cover transition duration-500 hover:scale-110"
                        src="https://images.unsplash.com/photo-1591543620767-582b2e76369e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Palm Plantation">
                </div>
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img class="h-64 w-full object-cover transition duration-500 hover:scale-110"
                        src="https://images.unsplash.com/photo-1591315685611-fb7ece8c9b81?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Palm Trees">
                </div>
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img class="h-64 w-full object-cover transition duration-500 hover:scale-110"
                        src="https://images.unsplash.com/photo-1605493725784-56651e4c7565?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Palm Oil Processing">
                </div>
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img class="h-64 w-full object-cover transition duration-500 hover:scale-110"
                        src="https://images.unsplash.com/photo-1591543620767-582b2e76369e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Sustainable Farming">
                </div>
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img class="h-64 w-full object-cover transition duration-500 hover:scale-110"
                        src="https://images.unsplash.com/photo-1591315685611-fb7ece8c9b81?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Palm Oil Products">
                </div>
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img class="h-64 w-full object-cover transition duration-500 hover:scale-110"
                        src="https://images.unsplash.com/photo-1605493725784-56651e4c7565?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Quality Control">
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="bg-white py-16" id="products">
        <div class="container mx-auto px-4">
            <div class="mb-12 text-center">
                <h2 class="mb-2 text-3xl font-bold text-green-800 md:text-4xl">Our Products</h2>
                <div class="mx-auto h-1 w-20 bg-green-600"></div>
                <p class="mt-4 text-gray-600">High-quality palm oil products for various industries</p>
            </div>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Product 1 -->
                <div class="overflow-hidden rounded-lg bg-white shadow-lg">
                    <img class="h-56 w-full object-cover"
                        src="https://images.unsplash.com/photo-1605493725784-56651e4c7565?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Crude Palm Oil">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-bold text-green-700">Crude Palm Oil</h3>
                        <p class="mb-4 text-gray-600">
                            Our premium crude palm oil is extracted using state-of-the-art technology to ensure the highest
                            quality.
                        </p>
                        <a class="inline-block rounded bg-green-600 px-4 py-2 font-bold text-white transition duration-300 hover:bg-green-700"
                            href="#contact">
                            Inquire Now
                        </a>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="overflow-hidden rounded-lg bg-white shadow-lg">
                    <img class="h-56 w-full object-cover"
                        src="https://images.unsplash.com/photo-1591543620767-582b2e76369e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Palm Kernel Oil">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-bold text-green-700">Palm Kernel Oil</h3>
                        <p class="mb-4 text-gray-600">
                            Extracted from the kernel of the oil palm fruit, our palm kernel oil is perfect for cosmetics
                            and food industries.
                        </p>
                        <a class="inline-block rounded bg-green-600 px-4 py-2 font-bold text-white transition duration-300 hover:bg-green-700"
                            href="#contact">
                            Inquire Now
                        </a>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="overflow-hidden rounded-lg bg-white shadow-lg">
                    <img class="h-56 w-full object-cover"
                        src="https://images.unsplash.com/photo-1591315685611-fb7ece8c9b81?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Palm Biodiesel">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-bold text-green-700">Palm Biodiesel</h3>
                        <p class="mb-4 text-gray-600">
                            Our sustainable palm biodiesel offers an eco-friendly alternative fuel for a greener future.
                        </p>
                        <a class="inline-block rounded bg-green-600 px-4 py-2 font-bold text-white transition duration-300 hover:bg-green-700"
                            href="#contact">
                            Inquire Now
                        </a>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="overflow-hidden rounded-lg bg-white shadow-lg">
                    <img class="h-56 w-full object-cover"
                        src="https://images.unsplash.com/photo-1605493725784-56651e4c7565?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Palm Olein">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-bold text-green-700">Palm Olein</h3>
                        <p class="mb-4 text-gray-600">
                            A liquid fraction obtained from the fractionation of palm oil, ideal for cooking and frying.
                        </p>
                        <a class="inline-block rounded bg-green-600 px-4 py-2 font-bold text-white transition duration-300 hover:bg-green-700"
                            href="#contact">
                            Inquire Now
                        </a>
                    </div>
                </div>

                <!-- Product 5 -->
                <div class="overflow-hidden rounded-lg bg-white shadow-lg">
                    <img class="h-56 w-full object-cover"
                        src="https://images.unsplash.com/photo-1591543620767-582b2e76369e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Palm Stearin">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-bold text-green-700">Palm Stearin</h3>
                        <p class="mb-4 text-gray-600">
                            The solid fraction of palm oil, widely used in food applications and soap manufacturing.
                        </p>
                        <a class="inline-block rounded bg-green-600 px-4 py-2 font-bold text-white transition duration-300 hover:bg-green-700"
                            href="#contact">
                            Inquire Now
                        </a>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="overflow-hidden rounded-lg bg-white shadow-lg">
                    <img class="h-56 w-full object-cover"
                        src="https://images.unsplash.com/photo-1591315685611-fb7ece8c9b81?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Palm Wax">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-bold text-green-700">Palm Wax</h3>
                        <p class="mb-4 text-gray-600">
                            Our palm wax is perfect for candle making, providing a beautiful crystalline appearance.
                        </p>
                        <a class="inline-block rounded bg-green-600 px-4 py-2 font-bold text-white transition duration-300 hover:bg-green-700"
                            href="#contact">
                            Inquire Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="bg-gray-100 py-16" id="contact">
        <div class="container mx-auto px-4">
            <div class="mb-12 text-center">
                <h2 class="mb-2 text-3xl font-bold text-green-800 md:text-4xl">Contact Us</h2>
                <div class="mx-auto h-1 w-20 bg-green-600"></div>
                <p class="mt-4 text-gray-600">Get in touch with our team for inquiries and orders</p>
            </div>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                <div>
                    <form class="rounded-lg bg-white p-6 shadow-lg">
                        <div class="mb-4">
                            <label class="mb-2 block font-bold text-gray-700" for="name">Name</label>
                            <input
                                class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600"
                                id="name" type="text">
                        </div>
                        <div class="mb-4">
                            <label class="mb-2 block font-bold text-gray-700" for="email">Email</label>
                            <input
                                class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600"
                                id="email" type="email">
                        </div>
                        <div class="mb-4">
                            <label class="mb-2 block font-bold text-gray-700" for="subject">Subject</label>
                            <input
                                class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600"
                                id="subject" type="text">
                        </div>
                        <div class="mb-4">
                            <label class="mb-2 block font-bold text-gray-700" for="message">Message</label>
                            <textarea
                                class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600"
                                id="message" rows="4"></textarea>
                        </div>
                        <button
                            class="w-full rounded bg-green-600 px-4 py-2 font-bold text-white transition duration-300 hover:bg-green-700"
                            type="submit">
                            Send Message
                        </button>
                    </form>
                </div>
                <div>
                    <div class="h-full rounded-lg bg-white p-6 shadow-lg">
                        <h3 class="mb-4 text-xl font-bold text-green-700">Our Information</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt mr-3 mt-1 w-5 text-green-600"></i>
                                <div>
                                    <h4 class="font-bold">Address</h4>
                                    <p class="text-gray-600">123 Palm Avenue, Green City, Country</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-phone-alt mr-3 mt-1 w-5 text-green-600"></i>
                                <div>
                                    <h4 class="font-bold">Phone</h4>
                                    <p class="text-gray-600">+1 234 567 890</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-envelope mr-3 mt-1 w-5 text-green-600"></i>
                                <div>
                                    <h4 class="font-bold">Email</h4>
                                    <p class="text-gray-600">info@palmeco.com</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-clock mr-3 mt-1 w-5 text-green-600"></i>
                                <div>
                                    <h4 class="font-bold">Business Hours</h4>
                                    <p class="text-gray-600">Monday - Friday: 9:00 AM - 5:00 PM</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <h4 class="mb-2 font-bold">Follow Us</h4>
                            <div class="flex space-x-4">
                                <a class="rounded-full bg-green-600 px-3.5 py-2 w-10 h-10 text-white transition duration-300 hover:bg-green-700"
                                    href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="rounded-full bg-green-600 px-3 py-2 w-10 h-10 text-white transition duration-300 hover:bg-green-700"
                                    href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="rounded-full bg-green-600 px-3 py-2 w-10 h-10 text-white transition duration-300 hover:bg-green-700"
                                    href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a class="rounded-full bg-green-600 px-3 py-2 w-10 h-10 text-white transition duration-300 hover:bg-green-700"
                                    href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
