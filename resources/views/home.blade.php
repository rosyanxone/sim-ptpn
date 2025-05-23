@extends('layouts.app')

@section('title', 'Selamat Datang')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section py-32 text-white" id="home"
        style="background-image: url('{{ asset('images/header.jpg') }}')">
        <div class="container mx-auto px-4 text-center">
            <div class="text-shadow-md mb-8 space-y-4">
                <h1 class="text-4xl font-bold shadow-md md:text-6xl">
                    PT Perkebunan Nusantara IV
                </h1>
                <p class="hadow-md text-xl md:text-2xl">
                    Tumbuh, Juara, Bangun Negeri
                </p>
            </div>
            <div class="flex flex-col justify-center gap-4 sm:flex-row">
                <a class="rounded-lg bg-green-600 px-6 py-3 font-bold text-white transition duration-300 hover:bg-green-700"
                    href="#products">
                    Produk kami
                </a>
                <a class="rounded-lg border-2 border-white bg-gray-500/50 px-6 py-3 font-bold text-white transition duration-300 hover:bg-white hover:text-green-700"
                    href="#contact">
                    Kontak kami
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="bg-white py-16" id="about">
        <div class="container mx-auto px-4">
            <div class="mb-12 text-center">
                <h2 class="mb-2 text-3xl font-bold text-green-800 md:text-4xl">Tentang</h2>
                <div class="mx-auto h-1 w-20 bg-green-600"></div>
            </div>
            <div class="grid grid-cols-1 items-center gap-8 md:grid-cols-2">
                <div>
                    <img class="h-auto w-full rounded-lg shadow-lg"
                        src="https://images.unsplash.com/photo-1591543620767-582b2e76369e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Palm Oil Plantation">
                </div>
                <div>
                    <h3 class="mb-4 text-2xl font-bold text-green-700">Cerita</h3>
                    <p class="mb-4 text-gray-700">
                        PT Perkebunan Nusantara III (Persero) atau PTPN III (Persero) , merupakan Badan Usaha Milik Negara
                        (BUMN) Holding Perkebunan yang bergerak di bidang pengelolaan, pengolahan dan pemasaran hasil
                        komoditi perkebunan. Komoditi perkebunan yang diusahakan adalah kelapa sawit, karet, tebu, teh,
                        kopi, kakao, tembakau, aneka kayuan, buah-buahan dan aneka tanaman lainnya. Saat ini PT Perkebunan
                        Nusantara III (Persero) telah memiliki Brand Nasional produk Hilirisasi Komoditi perkebunan dengan
                        nama “Nusakita” disamping beberapa brand lain yang dimiliki oleh Anak Perusahaan dari PTPN Group.
                    </p>
                    <h3 class="mb-4 text-2xl font-bold text-green-700">Visi</h3>
                    <p class="mb-4 text-gray-700">
                        Menjadi perusahaan agribisnis nasional yang unggul dan berdaya saing kelas dunia serta berkontribusi
                        secara berkesinambungan bagi kemajuan bangsa.
                    </p>
                    <h3 class="mb-4 text-2xl font-bold text-green-700">Misi</h3>
                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <div class="rounded-lg bg-green-50 p-4">
                            <i class="fas fa-leaf mb-2 text-3xl text-green-600"></i>
                            <h4 class="font-bold text-green-700">Produk Berkualitas</h4>
                        </div>
                        <div class="rounded-lg bg-green-50 p-4">
                            <i class="fas fa-recycle mb-2 text-3xl text-green-600"></i>
                            <h4 class="font-bold italic text-green-700">Operational Excellence</h4>
                        </div>
                        <div class="rounded-lg bg-green-50 p-4">
                            <i class="fas fa-handshake mb-2 text-3xl text-green-600"></i>
                            <h4 class="font-bold text-green-700">Optimalisasi Asset</h4>
                        </div>
                        <div class="rounded-lg bg-green-50 p-4">
                            <i class="fas fa-certificate mb-2 text-3xl text-green-600"></i>
                            <h4 class="font-bold text-green-700">Menjaga Lingkungan</h4>
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
                <h2 class="mb-2 text-3xl font-bold text-green-800 md:text-4xl">Galeri</h2>
                <div class="mx-auto h-1 w-20 bg-green-600"></div>
                <p class="mt-4 text-gray-600">Tinjau perkebunan dan fasilitas produksi kami</p>
            </div>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img class="h-64 w-full object-cover transition duration-500 hover:scale-110"
                        src="{{ asset('images/gallery/image-1.jpeg') }}" alt="Palm Plantation">
                </div>
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img class="h-64 w-full object-cover transition duration-500 hover:scale-110"
                        src="{{ asset('images/gallery/image-2.jpg') }}" alt="Palm Trees">
                </div>
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img class="h-64 w-full object-cover transition duration-500 hover:scale-110"
                        src="{{ asset('images/gallery/image-3.jpg') }}" alt="Palm Oil Processing">
                </div>
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img class="h-64 w-full object-cover transition duration-500 hover:scale-110"
                        src="{{ asset('images/gallery/image-4.jpg') }}" alt="Sustainable Farming">
                </div>
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img class="h-64 w-full object-cover transition duration-500 hover:scale-110"
                        src="{{ asset('images/gallery/image-5.jpg') }}" alt="Palm Oil Products">
                </div>
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img class="h-64 w-full object-cover transition duration-500 hover:scale-110"
                        src="{{ asset('images/gallery/image-6.jpeg') }}" alt="Quality Control">
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="bg-white py-16" id="products">
        <div class="container mx-auto px-4">
            <div class="mb-12 text-center">
                <h2 class="mb-2 text-3xl font-bold text-green-800 md:text-4xl">Produk</h2>
                <div class="mx-auto h-1 w-20 bg-green-600"></div>
                <p class="mt-4 text-gray-600">Produk minyak sawit berkualitas tinggi untuk berbagai industri</p>
            </div>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Product 1 -->
                <div class="overflow-hidden rounded-lg bg-white shadow-lg">
                    <img class="h-56 w-full object-cover" src="{{ asset('images/products/produk-1.jpg') }}"
                        alt="Kelapa Sawit">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-bold text-green-700">Kelapa Sawit</h3>
                        <p class="mb-4 text-gray-600">
                            Kelapa Sawit merupakan komoditas utama dari PT Perkebunan Nusantara III ( Persero), perkebunan
                            kelapa sawit tersebar di seluruh wilayah Indonesia melalui anak perusahaan Perkebunan Nusantara
                            Group.
                        </p>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="overflow-hidden rounded-lg bg-white shadow-lg">
                    <img class="h-56 w-full object-cover" src="{{ asset('images/products/produk-2.jpeg') }}" alt="Karet">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-bold text-green-700">Karet</h3>
                        <p class="mb-4 text-gray-600">
                            Karet merupakan salah satu komoditas yang dikelola oleh PT Perkebunan Nusantara III (Persero),
                            perkebunan karet tersebar di seluruh wilayah Indonesia melalui anak perusahaan Perkebunan
                            Nusantara Group.
                        </p>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="overflow-hidden rounded-lg bg-white shadow-lg">
                    <img class="h-56 w-full object-cover" src="{{ asset('images/products/produk-3.jpg') }}" alt="Teh">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-bold text-green-700">Teh</h3>
                        <p class="mb-4 text-gray-600">
                            Teh merupakan salah satu komoditas perkebunan yang dikelola oleh PT Perkebunan Nusantara III
                            (Persero), perkebunan teh tersebar di beberapa wilayah kerja di Sumatera Utara, Jambi, Lampung,
                            Jawa Barat dan Jawa Timur melalui anak perusahaan Perkebunan Nusantara Group.
                        </p>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="overflow-hidden rounded-lg bg-white shadow-lg">
                    <img class="h-56 w-full object-cover" src="{{ asset('images/products/produk-4.jpg') }}"
                        alt="Kopi">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-bold text-green-700">Kopi</h3>
                        <p class="mb-4 text-gray-600">
                            Kopi merupakan salah satu komoditas yang di budidaya oleh PTPN III (Persero), perkebunan Kopi
                            tersebar di bebrapa wilayah khususnya di wilayah Pulau Jawa melalui anak perusahaan Perkebunan
                            Nusantara Group.
                        </p>
                    </div>
                </div>

                <!-- Product 5 -->
                <div class="overflow-hidden rounded-lg bg-white shadow-lg">
                    <img class="h-56 w-full object-cover" src="{{ asset('images/products/produk-1.jpg') }}"
                        alt="Tebu">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-bold text-green-700">Tebu</h3>
                        <p class="mb-4 text-gray-600">
                            Tebu merupakan salah satu komoditas utama dari PT Perkebunan Nusantara III ( Persero),
                            perkebunan tebu tersebar di beberapa wilayah terutama di Sumatera Utara, Pulau Jawa dan Pulau
                            Sulawesi melalui anak perusahaan Perkebunan Nusantara Group.
                        </p>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="overflow-hidden rounded-lg bg-white shadow-lg">
                    <img class="h-56 w-full object-cover" src="{{ asset('images/products/produk-6.jpg') }}"
                        alt="Kakao">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-bold text-green-700">Kakao</h3>
                        <p class="mb-4 text-gray-600">
                            Kakao merupakan salah satu komoditas perkebunan dari PTPN III (Persero) terutama dikelola oleh
                            PTPN XII selaku Anak Perusahaan, perkebunan Kakao tersebar di wilayah Provinsi Jawa Timur yang
                            dikenal merupakan penghasil Kakao terbaik di Indonesia.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="bg-gray-100 py-16" id="contact">
        <div class="container mx-auto px-4">
            <div class="mb-12 text-center">
                <h2 class="mb-2 text-3xl font-bold text-green-800 md:text-4xl">Kontak</h2>
                <div class="mx-auto h-1 w-20 bg-green-600"></div>
                <p class="mt-4 text-gray-600">Hubungi tim kami untuk pertanyaan dan pesanan</p>
            </div>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                <div>
                    <form class="rounded-lg bg-white p-6 shadow-lg">
                        <div class="mb-4">
                            <label class="mb-2 block font-bold text-gray-700" for="name">Nama</label>
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
                            <label class="mb-2 block font-bold text-gray-700" for="subject">Subjek</label>
                            <input
                                class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600"
                                id="subject" type="text">
                        </div>
                        <div class="mb-4">
                            <label class="mb-2 block font-bold text-gray-700" for="message">Pesan</label>
                            <textarea
                                class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600"
                                id="message" rows="4"></textarea>
                        </div>
                        <button
                            class="w-full rounded bg-green-600 px-4 py-2 font-bold text-white transition duration-300 hover:bg-green-700"
                            type="submit">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
                <div>
                    <div class="h-full rounded-lg bg-white p-6 shadow-lg">
                        <h3 class="mb-4 text-xl font-bold text-green-700">Informasi Kami</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt mr-3 mt-1 w-5 text-green-600"></i>
                                <div>
                                    <h4 class="font-bold">Alamat</h4>
                                    <p class="max-w-[460px] text-gray-600">
                                        Jl. Slt. Abdurrahman No.11, Sungai Bangkong, Kec. Pontianak Kota, Kota Pontianak,
                                        Kalimantan Barat 78113
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-phone-alt mr-3 mt-1 w-5 text-green-600"></i>
                                <div>
                                    <h4 class="font-bold">Telepon</h4>
                                    <p class="text-gray-600">(0561) 749367</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-envelope mr-3 mt-1 w-5 text-green-600"></i>
                                <div>
                                    <h4 class="font-bold">Email</h4>
                                    <p class="text-gray-600">ptpnusantara4@ptpn4.co</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-clock mr-3 mt-1 w-5 text-green-600"></i>
                                <div>
                                    <h4 class="font-bold">Jam kerja</h4>
                                    <p class="text-gray-600">Senin - Jumat: 09:00 - 17:00</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <h4 class="mb-2 font-bold">Ikuti Kami</h4>
                            <div class="flex space-x-4">
                                <a class="h-10 w-10 rounded-full bg-green-600 px-3.5 py-2 text-white transition duration-300 hover:bg-green-700"
                                    href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="h-10 w-10 rounded-full bg-green-600 px-3 py-2 text-white transition duration-300 hover:bg-green-700"
                                    href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="h-10 w-10 rounded-full bg-green-600 px-3 py-2 text-white transition duration-300 hover:bg-green-700"
                                    href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a class="h-10 w-10 rounded-full bg-green-600 px-3 py-2 text-white transition duration-300 hover:bg-green-700"
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
