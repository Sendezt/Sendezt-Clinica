<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses Ditolak | Klinik Sehat Bahagia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .wave-shape {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }
        
        .wave-shape svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 150px;
        }
        
        .wave-shape .shape-fill {
            fill: #EFF6FF;
        }
        
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body class="bg-blue-50 font-sans">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow-sm">
            <div class="container mx-auto px-4 py-3 flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-heartbeat text-3xl text-blue-600"></i>
                    <span class="text-xl font-bold text-blue-800">Klinik Sehat Bahagia</span>
                </div>
                <nav class="hidden md:flex space-x-6">
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Beranda</a>
                    <a href="#" class="text-gray-600 hover:text-blue-800 font-medium">Layanan</a>
                    <a href="#" class="text-gray-600 hover:text-blue-800 font-medium">Dokter</a>
                    <a href="#" class="text-gray-600 hover:text-blue-800 font-medium">Kontak</a>
                </nav>
                <button class="md:hidden text-gray-600">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow flex items-center justify-center relative overflow-hidden">
            <div class="container mx-auto px-4 py-12 flex flex-col md:flex-row items-center justify-center">
                <!-- Illustration -->
                <div class="md:w-1/2 mb-10 md:mb-0 flex justify-center relative">
                    <div class="relative w-64 h-64 md:w-80 md:h-80">
                        <div class="absolute inset-0 bg-blue-100 rounded-full opacity-30"></div>
                        <div class="absolute inset-4 bg-blue-200 rounded-full opacity-20"></div>
                        <img src="https://img.icons8.com/fluency/240/000000/no-entry.png" alt="403 Forbidden" class="relative z-10 w-full h-full object-contain floating">
                    </div>
                </div>
                
                <!-- Text Content -->
                <div class="md:w-1/2 text-center md:text-left">
                    <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-4">403</h1>
                    <h2 class="text-2xl md:text-3xl font-semibold text-blue-700 mb-4">Akses Ditolak</h2>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto md:mx-0">
                        Maaf, Anda tidak memiliki izin untuk mengakses halaman ini. 
                        Jika Anda merasa ini adalah kesalahan, silakan hubungi administrator klinik.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row justify-center md:justify-start space-y-3 sm:space-y-0 sm:space-x-4">
                        <a href="/" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-md transition duration-300 flex items-center justify-center space-x-2 pulse-animation">
                            <i class="fas fa-home"></i>
                            <span>Kembali ke Beranda</span>
                        </a>
                        <a href="mailto:admin@kliniksehatbahagia.com" class="px-6 py-3 border border-blue-600 text-blue-600 hover:bg-blue-50 font-medium rounded-lg transition duration-300 flex items-center justify-center space-x-2">
                            <i class="fas fa-envelope"></i>
                            <span>Hubungi Admin</span>
                        </a>
                    </div>
                    
                    <div class="mt-8 flex items-center justify-center md:justify-start space-x-4">
                        <div class="flex items-center space-x-2 text-blue-600">
                            <i class="fas fa-phone-alt"></i>
                            <span>+62 123 4567 890</span>
                        </div>
                        <div class="hidden md:block w-px h-6 bg-gray-300"></div>
                        <div class="flex items-center space-x-2 text-blue-600">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Jl. Kesehatan No. 123</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-blue-800 text-white py-6">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-4 md:mb-0">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-heartbeat text-2xl"></i>
                            <span class="text-xl font-bold">Klinik Sehat Bahagia</span>
                        </div>
                        <p class="text-blue-200 mt-1">Memberikan pelayanan kesehatan terbaik untuk Anda</p>
                    </div>
                    <div class="flex space-x-6">
                        <a href="#" class="text-blue-200 hover:text-white">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="text-blue-200 hover:text-white">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-blue-200 hover:text-white">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                    </div>
                </div>
                <div class="border-t border-blue-700 mt-6 pt-6 text-center text-blue-200 text-sm">
                    <p>&copy; 2023 Klinik Sehat Bahagia. Semua hak dilindungi.</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Simple animation for the forbidden icon
        document.addEventListener('DOMContentLoaded', function() {
            const forbiddenIcon = document.querySelector('.floating');
            
            setInterval(() => {
                forbiddenIcon.style.transform = 'rotate(5deg)';
                setTimeout(() => {
                    forbiddenIcon.style.transform = 'rotate(-5deg)';
                }, 1500);
            }, 3000);
            
            // Button hover effect
            const buttons = document.querySelectorAll('a[href]');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });
                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>