<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Sehat Digital - Layanan Kesehatan Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, #e0f2fe 0%, #ccfbf1 100%);
        }
        
        .btn-primary {
            background-color: #38bdf8;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #0ea5e9;
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background-color: #2dd4bf;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background-color: #14b8a6;
            transform: translateY(-2px);
        }
        
        .feature-card {
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .doctor-illustration {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body class="text-gray-700">
    <!-- Header/Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
    
            <!-- Kiri: Logo dan Judul -->
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                    <i class="fas fa-heartbeat text-blue-500 text-xl"></i>
                </div>
                <h1 class="text-xl font-bold text-blue-600">
                Klinik Sehat<span class="text-emerald-500">Digital</span>
            </h1>
        </div>
    <!-- Tengah + Kanan: Navigasi dan Login -->
        <div class="hidden md:flex items-center space-x-8">
            <nav class="flex space-x-8">
                <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Beranda</a>
                <a href="#" class="font-medium text-gray-600 hover:text-blue-600">Layanan</a>
                <a href="#" class="font-medium text-gray-600 hover:text-blue-600">Dokter</a>
                <a href="#" class="font-medium text-gray-600 hover:text-blue-600">Tentang Kami</a>
                <a href="#" class="font-medium text-gray-600 hover:text-blue-600">Kontak</a>
            </nav>
            <!-- Tombol Login -->
            <a href="/login" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Login
            </a>
        </div>

        <!-- Tombol Hamburger untuk Mobile -->
        <button class="md:hidden text-gray-600">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>
</header>


    <!-- Hero Section -->
    <section class="hero-gradient py-16 md:py-24">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-12 md:mb-0">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 mb-4">
                    Selamat Datang di <span class="text-blue-600">Klinik Sehat</span><span class="text-emerald-500">Digital</span>
                </h1>
                <p class="text-lg text-gray-600 mb-8">
                    Layanan kesehatan online yang memudahkan Anda untuk berkonsultasi dengan dokter dan mendaftar ke poli secara cepat tanpa antrian.
                </p>
                <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                    <a href="#" class="btn-primary text-white font-semibold py-3 px-6 rounded-lg shadow-md text-center">
                        <i class="fas fa-calendar-plus mr-2"></i> Daftar ke Poli Sekarang
                    </a>
                    <a href="#" class="btn-secondary text-white font-semibold py-3 px-6 rounded-lg shadow-md text-center">
                        <i class="fas fa-user-md mr-2"></i> Lihat Jadwal Dokter
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <img src="https://cdn-icons-png.flaticon.com/512/3003/3003984.png" alt="Doctor illustration" class="doctor-illustration w-64 md:w-80 lg:w-96">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-4">Kenapa Memilih Kami?</h2>
            <p class="text-lg text-gray-600 text-center max-w-2xl mx-auto mb-12">
                Klinik Sehat Digital memberikan pengalaman berbeda dalam layanan kesehatan
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="feature-card bg-white p-8 rounded-xl shadow-md border border-gray-100">
                    <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mb-6">
                        <i class="fas fa-clock text-blue-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Tanpa Antrian</h3>
                    <p class="text-gray-600">Daftar online dan dapatkan nomor antrian virtual tanpa perlu datang lebih awal.</p>
                </div>
                
                <div class="feature-card bg-white p-8 rounded-xl shadow-md border border-gray-100">
                    <div class="w-16 h-16 rounded-full bg-emerald-100 flex items-center justify-center mb-6">
                        <i class="fas fa-user-md text-emerald-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Dokter Profesional</h3>
                    <p class="text-gray-600">Tim dokter spesialis berpengalaman siap memberikan pelayanan terbaik untuk Anda.</p>
                </div>
                
                <div class="feature-card bg-white p-8 rounded-xl shadow-md border border-gray-100">
                    <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mb-6">
                        <i class="fas fa-mobile-alt text-blue-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Akses Mudah</h3>
                    <p class="text-gray-600">Pantau jadwal dan status antrian melalui smartphone kapan saja dan di mana saja.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-4">Cara Mendaftar</h2>
            <p class="text-lg text-gray-600 text-center max-w-2xl mx-auto mb-12">
                Hanya perlu 3 langkah mudah untuk mendapatkan layanan kami
            </p>
            
            <div class="flex flex-col md:flex-row justify-center items-center md:items-start space-y-8 md:space-y-0 md:space-x-8 lg:space-x-16">
                <div class="flex flex-col items-center text-center max-w-xs">
                    <div class="w-20 h-20 rounded-full bg-blue-100 flex items-center justify-center mb-4">
                        <span class="text-blue-600 font-bold text-2xl">1</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Pilih Poli</h3>
                    <p class="text-gray-600">Pilih poli atau dokter spesialis yang Anda butuhkan</p>
                </div>
                
                <div class="flex flex-col items-center text-center max-w-xs">
                    <div class="w-20 h-20 rounded-full bg-emerald-100 flex items-center justify-center mb-4">
                        <span class="text-emerald-600 font-bold text-2xl">2</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Isi Formulir</h3>
                    <p class="text-gray-600">Lengkapi data diri dan keluhan kesehatan Anda</p>
                </div>
                
                <div class="flex flex-col items-center text-center max-w-xs">
                    <div class="w-20 h-20 rounded-full bg-blue-100 flex items-center justify-center mb-4">
                        <span class="text-blue-600 font-bold text-2xl">3</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Konfirmasi</h3>
                    <p class="text-gray-600">Dapatkan nomor antrian dan konfirmasi via WhatsApp</p>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="#" class="btn-primary inline-block text-white font-semibold py-3 px-8 rounded-lg shadow-md">
                    Mulai Daftar Sekarang <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-4">Apa Kata Pasien Kami?</h2>
            <p class="text-lg text-gray-600 text-center max-w-2xl mx-auto mb-12">
                Testimoni dari pasien yang telah menggunakan layanan Klinik Sehat Digital
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                            <i class="fas fa-user text-blue-500"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold">Budi Santoso</h4>
                            <p class="text-sm text-gray-500">Pasien Poli Umum</p>
                        </div>
                    </div>
                    <p class="text-gray-600">
                        "Sangat praktis! Saya bisa daftar dari rumah dan datang sesuai jadwal. Tidak perlu antri lama seperti dulu."
                    </p>
                    <div class="flex mt-3 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center mr-4">
                            <i class="fas fa-user text-emerald-500"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold">Ani Wijaya</h4>
                            <p class="text-sm text-gray-500">Pasien Poli Anak</p>
                        </div>
                    </div>
                    <p class="text-gray-600">
                        "Dokternya sangat ramah dan profesional. Anak saya tidak takut lagi periksa ke dokter sejak pakai layanan ini."
                    </p>
                    <div class="flex mt-3 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                            <i class="fas fa-user text-blue-500"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold">Rina Hartati</h4>
                            <p class="text-sm text-gray-500">Pasien Poli Gigi</p>
                        </div>
                    </div>
                    <p class="text-gray-600">
                        "Sistem antriannya sangat membantu. Saya bisa tahu perkiraan waktu pemeriksaan sehingga tidak perlu menunggu lama di klinik."
                    </p>
                    <div class="flex mt-3 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-blue-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">Siap Memulai Perawatan Kesehatan Anda?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Daftarkan diri Anda sekarang dan dapatkan kemudahan akses layanan kesehatan berkualitas
            </p>
            <div class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-4">
                <a href="#" class="bg-white text-blue-600 font-semibold py-3 px-8 rounded-lg shadow-md hover:bg-gray-100 transition">
                    <i class="fas fa-user-plus mr-2"></i> Daftar Sekarang
                </a>
                <a href="#" class="border-2 border-white text-white font-semibold py-3 px-8 rounded-lg hover:bg-white hover:text-blue-600 transition">
                    <i class="fas fa-phone-alt mr-2"></i> Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                            <i class="fas fa-heartbeat text-blue-500"></i>
                        </div>
                        <h3 class="text-xl font-bold">Klinik Sehat<span class="text-emerald-400">Digital</span></h3>
                    </div>
                    <p class="text-gray-400 mb-4">
                        Layanan kesehatan online terpercaya untuk keluarga Indonesia.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Layanan</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Poli Umum</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Poli Anak</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Poli Gigi</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Poli Kandungan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Poli Penyakit Dalam</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Informasi</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Dokter Kami</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Blog Kesehatan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Kebijakan Privasi</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt text-gray-400 mr-3"></i>
                            <span class="text-gray-400">Jl. Kesehatan No. 123, Jakarta</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt text-gray-400 mr-3"></i>
                            <span class="text-gray-400">(021) 1234567</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope text-gray-400 mr-3"></i>
                            <span class="text-gray-400">info@kliniksehat.com</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock text-gray-400 mr-3"></i>
                            <span class="text-gray-400">Senin-Minggu: 08.00-20.00 WIB</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; 2023 Klinik SehatDigital. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <a href="#" class="bg-green-500 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:bg-green-600 transition">
            <i class="fab fa-whatsapp text-2xl"></i>
        </a>
    </div>

    <script>
        // Simple script for mobile menu toggle (can be expanded)
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('.md\\:hidden');
            // In a real implementation, you would add click handler to show mobile menu
        });
    </script>
</body>
</html>