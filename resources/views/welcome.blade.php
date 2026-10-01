<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Pendaftaran Siswa Baru</title>

    <!-- Google Fonts: Poppins untuk kesan Modern & Profesional -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (via CDN agar langsung aktif tanpa build) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- FontAwesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Konfigurasi Custom Tailwind & CSS Tambahan -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        primary: '#4F46E5', // Indigo 600
                        secondary: '#10B981', // Emerald 500
                        dark: '#0B1120',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #0B1120;
            color: #ffffff;
            overflow-x: hidden;
        }
        
        /* Efek Kaca (Glassmorphism) untuk Navbar & Card */
        .glass {
            background: rgba(17, 24, 39, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Animasi Mengambang */
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        /* Teks Gradasi Mewah */
        .text-gradient {
            background: linear-gradient(to right, #60A5FA, #A78BFA, #34D399);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Efek Muncul saat di Scroll */
        .reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease-out;
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Ornamen Cahaya Background */
        .glow-blob {
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(79,70,229,0.4) 0%, rgba(0,0,0,0) 70%);
            border-radius: 50%;
            filter: blur(40px);
            z-index: -1;
            animation: pulse 8s infinite alternate;
        }
        .glow-blob.secondary {
            background: radial-gradient(circle, rgba(16,185,129,0.3) 0%, rgba(0,0,0,0) 70%);
            right: 0;
            bottom: 0;
        }
        @keyframes pulse {
            0% { transform: scale(1); opacity: 0.5; }
            100% { transform: scale(1.5); opacity: 1; }
        }
    </style>
</head>
<body class="antialiased selection:bg-primary selection:text-white">

    <!-- Ornamen Latar Belakang -->
    <div class="glow-blob top-20 left-10"></div>
    <div class="glow-blob secondary top-1/2 right-10"></div>

    <!-- NAVBAR (Sticky & Glassmorphism) -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 py-4">
        <div class="max-w-7xl mx-auto px-6 md:px-12 flex justify-between items-center">
            <!-- Logo -->
            <a href="#" class="text-2xl font-bold tracking-tighter flex items-center gap-2">
                <img src="{{ asset('https://ppsmk.dindik.jatimprov.go.id/aksibisa/uploads/sekolah/20240801_e95a42050f80933.webp') }}" alt="Logo SMK PGRI 2" class="h-10 w-auto mr-3">
                <span class="text-white">SMKS PGRI 2 PONOROGO<span class="text-primary">.</span></span>
            </a>

            <!-- Tombol Navigasi Desktop -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('cek-status.index') }}" class="text-gray-300 hover:text-white transition font-medium">Cek Status</a>
                <a href="/admin" class="text-gray-300 hover:text-white transition font-medium">Admin Panel</a>
                
                @if (Route::has('login'))
                    <div class="flex items-center space-x-4 border-l border-gray-700 pl-6">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-white bg-gray-800 hover:bg-gray-700 px-5 py-2 rounded-full transition border border-gray-600">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-300 hover:text-white transition">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm font-semibold text-white bg-gradient-to-r from-primary to-purple-600 hover:from-primary hover:to-primary px-6 py-2.5 rounded-full transition shadow-lg shadow-primary/30 transform hover:scale-105">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>

            <!-- Menu Mobile (Hamburger) -->
            <button class="md:hidden text-white text-2xl focus:outline-none">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- HERO SECTION (Rame & Mewah) -->
    <section class="relative min-h-screen flex items-center pt-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 md:px-12 grid md:grid-cols-2 gap-12 items-center relative z-10">
            
            <!-- Bagian Teks Kiri -->
            <div class="space-y-8 reveal active">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass text-sm text-secondary font-medium border border-secondary/30">
                    <span class="relative flex h-3 w-3">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-secondary opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-3 w-3 bg-secondary"></span>
                    </span>
                    Pendaftaran Gelombang 1 Dibuka
                </div>
                
                <h1 class="text-5xl md:text-7xl font-extrabold leading-tight">
                    Masa Depan <br>
                    <span class="text-gradient typing-effect">Cemerlang</span> <br>
                    Dimulai Dari Sini.
                </h1>
                
                <p class="text-gray-400 text-lg md:text-xl max-w-lg leading-relaxed">
                    Bergabunglah bersama ribuan siswa berprestasi lainnya di SMKS PGRI 2 PONOROGO. Sistem pendaftaran modern, cepat, dan transparan.
                </p>
                
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="{{ route('register') }}" class="flex items-center gap-2 bg-white text-dark font-bold px-8 py-4 rounded-full hover:bg-gray-200 transition transform hover:-translate-y-1 shadow-xl">
                        Daftar Sekarang <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a href="{{ route('cek-status.index') }}" class="flex items-center gap-2 glass text-white font-semibold px-8 py-4 rounded-full hover:bg-gray-800 transition border border-gray-600">
                        <i class="fa-solid fa-magnifying-glass"></i> Cek Status
                    </a>
                </div>
            </div>

            <!-- Bagian Gambar/Ilustrasi Kanan -->
            <div class="relative hidden md:block reveal active floating">
                <!-- Elemen Kaca Estetik -->
                <div class="absolute inset-0 bg-gradient-to-tr from-primary/20 to-secondary/20 rounded-3xl transform rotate-3 scale-105 filter blur-xl"></div>
                <div class="glass p-8 rounded-3xl relative z-10 border border-white/10 shadow-2xl">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEielUsKgvhH95QAURKA00SVGtFM4MjquDvWapM90ORaQwe-OzTHqXRsluOTOSUt53FXHKJhNMroEX07jWGs8UezfdTi_UzqZfcPDf6YR3HMtku6Q5cTbHsysUjUDHsjTVOgUQz9HMThg0cVdfyAQtEWVOdpqTY4UkARiUBw2ij0NMr-_lO7xqnqOlngQKd-/s4608/IMG_20250430_090743.jpg" alt="Students" class="rounded-2xl object-cover h-96 w-full shadow-lg">
                    
                    <!-- Floating Badge -->
                    <div class="absolute -bottom-6 -left-6 glass px-6 py-4 rounded-2xl flex items-center gap-4 shadow-xl border border-white/10 animate-bounce" style="animation-duration: 3s;">
                        <div class="bg-secondary/20 p-3 rounded-full text-secondary text-2xl">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">Total Pendaftar</p>
                            <p class="text-xl font-bold text-white">1,245+ Siswa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FITUR & LANGKAH SECTION -->
    <section class="py-24 relative z-10 bg-dark">
        <div class="max-w-7xl mx-auto px-6 md:px-12">
            <div class="text-center mb-16 reveal">
                <h2 class="text-3xl md:text-5xl font-bold mb-4">Kenapa Memilih Kami?</h2>
                <p class="text-gray-400 max-w-2xl mx-auto text-lg">Proses pendaftaran yang dirancang khusus untuk kenyamanan dan keamanan data Anda.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="glass p-8 rounded-3xl hover:bg-gray-800/50 transition duration-300 transform hover:-translate-y-2 border border-white/5 reveal">
                    <div class="h-14 w-14 rounded-2xl bg-primary/20 text-primary flex items-center justify-center text-2xl mb-6 shadow-lg shadow-primary/20">
                        <i class="fa-solid fa-bolt"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-white">Proses Cepat</h3>
                    <p class="text-gray-400">Isi formulir secara online hanya dalam waktu kurang dari 5 menit tanpa perlu dokumen fisik rumit.</p>
                </div>

                <!-- Card 2 -->
                <div class="glass p-8 rounded-3xl hover:bg-gray-800/50 transition duration-300 transform hover:-translate-y-2 border border-white/5 reveal" style="transition-delay: 100ms;">
                    <div class="h-14 w-14 rounded-2xl bg-purple-500/20 text-purple-400 flex items-center justify-center text-2xl mb-6 shadow-lg shadow-purple-500/20">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-white">Data Aman</h3>
                    <p class="text-gray-400">Berkas dan foto Anda disimpan di sistem Cloud Storage dengan tingkat keamanan enkripsi tinggi.</p>
                </div>

                <!-- Card 3 -->
                <div class="glass p-8 rounded-3xl hover:bg-gray-800/50 transition duration-300 transform hover:-translate-y-2 border border-white/5 reveal" style="transition-delay: 200ms;">
                    <div class="h-14 w-14 rounded-2xl bg-secondary/20 text-secondary flex items-center justify-center text-2xl mb-6 shadow-lg shadow-secondary/20">
                        <i class="fa-solid fa-file-pdf"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-white">Cetak Kartu Otomatis</h3>
                    <p class="text-gray-400">Setelah mendaftar, sistem akan otomatis membuatkan kartu peserta resmi berformat PDF.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="border-t border-gray-800 bg-gray-900/50 py-12 relative z-10">
        <div class="max-w-7xl mx-auto px-6 md:px-12 text-center md:text-left flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <a href="#" class="text-2xl font-bold tracking-tighter flex items-center justify-center md:justify-start gap-2 mb-2">
                  <img src="{{ asset('https://ppsmk.dindik.jatimprov.go.id/aksibisa/uploads/sekolah/20240801_e95a42050f80933.webp') }}" alt="Logo SMK PGRI 2" class="h-10 w-auto mr-3">
                    <span class="text-white">SMKS PGRI 2 PONOROGO.</span>
                </a>
                <p class="text-gray-500 text-sm">© 2026 SMKS PGRI 2 PONOROGO. All rights reserved.</p>
            </div>
            <div class="flex space-x-6 text-2xl">
                <a href="https://instagram.com/SMKPGRI2Ponorogo" class="text-gray-500 hover:text-white transition"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://youtube.com/@smkspgri2ponorogo" class="text-gray-500 hover:text-white transition"><i class="fa-brands fa-youtube"></i></a>
                <a href="https://wa.me/6285853451269" class="text-gray-500 hover:text-white transition"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT UNTUK ANIMASI -->
    <script>
        // Efek Navbar saat di-scroll (Glassmorphism menjadi solid)
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('glass');
                navbar.classList.remove('py-4');
                navbar.classList.add('py-2');
            } else {
                navbar.classList.remove('glass');
                navbar.classList.add('py-4');
                navbar.classList.remove('py-2');
            }
        });

        // Efek Elemen Muncul (Reveal) saat di-scroll ke bawah
        function reveal() {
            var reveals = document.querySelectorAll(".reveal");
            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = reveals[i].getBoundingClientRect().top;
                var elementVisible = 100;

                if (elementTop < windowHeight - elementVisible) {
                    reveals[i].classList.add("active");
                }
            }
        }
        window.addEventListener("scroll", reveal);
        // Trigger sekali saat load
        reveal();
    </script>
</body>
</html>