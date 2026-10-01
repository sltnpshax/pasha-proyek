<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Portal PPDB</title>

    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif']
                    },
                    colors: {
                        primary: '#4F46E5',
                        secondary: '#10B981',
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
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* Efek Kaca (Glassmorphism) */
        .glass-card {
            background: rgba(17, 24, 39, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        /* Teks Gradasi */
        .text-gradient {
            background: linear-gradient(to right, #34D399, #60A5FA);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Ornamen Cahaya Background */
        .glow-blob {
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.25) 0%, rgba(0, 0, 0, 0) 70%);
            border-radius: 50%;
            filter: blur(50px);
            z-index: -1;
            animation: float-slow 12s infinite alternate;
        }

        .glow-blob.emerald {
            background: radial-gradient(circle, rgba(16, 185, 129, 0.2) 0%, rgba(0, 0, 0, 0) 70%);
            right: -100px;
            top: -100px;
            animation-duration: 15s;
        }

        .glow-blob.blue {
            background: radial-gradient(circle, rgba(59, 130, 246, 0.2) 0%, rgba(0, 0, 0, 0) 70%);
            left: -100px;
            bottom: -50px;
        }

        /* Animasi Mengambang */
        @keyframes float-slow {
            0% {
                transform: translate(0, 0) scale(1);
            }

            100% {
                transform: translate(40px, -40px) scale(1.1);
            }
        }

        /* Animasi Fade In */
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="flex items-center justify-center relative overflow-hidden py-10 md:py-0">

    <!-- Ornamen Latar Belakang -->
    <div class="glow-blob blue"></div>
    <div class="glow-blob emerald"></div>

    <!-- Container Utama -->
    <div class="w-full max-w-5xl px-6 flex items-center justify-center relative z-10 animate-fade-in my-auto">

        <!-- Tombol Kembali (Absolute di pojok) -->
        <!-- Tombol Kembali yang Rapi -->
        <a href="{{ url('/') }}" class="inline-flex items-center text-sm font-medium text-gray-400 hover:text-emerald-400 transition-colors duration-300 mb-8">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Beranda
        </a>

        <div class="glass-card w-full rounded-3xl overflow-hidden grid md:grid-cols-5 shadow-2xl mt-12 sm:mt-0">

            <!-- Bagian Kiri (Form Register - Lebar 3 kolom) -->
            <div class="col-span-3 p-8 md:p-10 flex flex-col justify-center order-2 md:order-1">

                <div class="text-center md:text-left mb-8">
                    <h2 class="text-2xl font-bold text-white mb-2">Buat Akun Baru</h2>
                    <p class="text-gray-400 text-sm">Isi data diri Anda dengan benar untuk memulai proses pendaftaran siswa baru.</p>
                </div>

                <!-- Form Utama Laravel -->
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <!-- Input Nama -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300 mb-1.5">Nama Lengkap</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition">
                                <i class="fa-regular fa-user text-gray-500 group-focus-within:text-primary transition"></i>
                            </div>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                                class="w-full bg-gray-900/50 border border-gray-700 text-white rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition placeholder-gray-600 shadow-inner">
                        </div>
                        @error('name')
                        <p class="text-red-400 text-xs mt-1.5 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Input Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-1.5">Email Aktif</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition">
                                <i class="fa-regular fa-envelope text-gray-500 group-focus-within:text-primary transition"></i>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                                class="w-full bg-gray-900/50 border border-gray-700 text-white rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition placeholder-gray-600 shadow-inner">
                        </div>
                        @error('email')
                        <p class="text-red-400 text-xs mt-1.5 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Input Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-300 mb-1.5">Kata Sandi</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition">
                                    <i class="fa-solid fa-lock text-gray-500 group-focus-within:text-primary transition"></i>
                                </div>
                                <input id="password" type="password" name="password" required autocomplete="new-password"
                                    class="w-full bg-gray-900/50 border border-gray-700 text-white rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition placeholder-gray-600 shadow-inner text-sm">
                            </div>
                            @error('password')
                            <p class="text-red-400 text-xs mt-1.5 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Input Konfirmasi Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-1.5">Ulangi Sandi</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition">
                                    <i class="fa-solid fa-shield-check text-gray-500 group-focus-within:text-primary transition"></i>
                                </div>
                                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                                    class="w-full bg-gray-900/50 border border-gray-700 text-white rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition placeholder-gray-600 shadow-inner text-sm">
                            </div>
                            @error('password_confirmation')
                            <p class="text-red-400 text-xs mt-1.5 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Tombol Register -->
                    <button type="submit" class="w-full font-bold text-white bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-400 hover:to-teal-400 py-3.5 rounded-xl transition-all shadow-lg shadow-emerald-500/30 transform hover:-translate-y-1 flex justify-center items-center gap-2 mt-4">
                        Daftar Akun Sekarang <i class="fa-solid fa-user-plus"></i>
                    </button>

                    <!-- Link Login -->
                    <p class="text-center text-sm text-gray-400 mt-6">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-white font-semibold hover:text-emerald-400 transition border-b border-dashed border-gray-500 hover:border-emerald-400 pb-0.5">Masuk di sini</a>
                    </p>
                </form>

            </div>

            <!-- Bagian Kanan (Informasi / Banner - Lebar 2 kolom) -->
            <div class="col-span-2 hidden md:flex flex-col justify-center p-10 relative bg-gradient-to-br from-emerald-500/10 to-transparent border-l border-white/5 order-1 md:order-2">
                <!-- Elemen Dekoratif -->
                <div class="absolute top-0 right-0 w-full h-1 bg-gradient-to-l from-emerald-500 to-transparent"></div>

                <div class="inline-flex items-center gap-3 mb-6">
                    <div class="bg-emerald-500/20 p-3 rounded-2xl text-emerald-400 text-2xl shadow-lg shadow-emerald-500/20">
                        <img src="{{ asset('https://ppsmk.dindik.jatimprov.go.id/aksibisa/uploads/sekolah/20240801_e95a42050f80933.webp') }}" alt="Logo SMK PGRI 2" class="h-10 w-auto mr-3">
                    </div>
                    <span class="text-xl font-bold tracking-wider">SMKS PGRI 2 PONOROGO.</span>
                </div>

                <h1 class="text-3xl font-extrabold mb-4 leading-tight">
                    Mulai Langkah <br>
                    <span class="text-gradient">Pertamamu!</span>
                </h1>

                <p class="text-gray-400 text-sm leading-relaxed mb-8">
                    Hanya butuh waktu kurang dari 2 menit untuk membuat akun. Bergabunglah sekarang untuk mendapatkan akses ke formulir pendaftaran resmi.
                </p>

                <!-- Fitur Mini -->
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="mt-1 text-emerald-400"><i class="fa-solid fa-circle-check"></i></div>
                        <div>
                            <h4 class="text-sm font-semibold text-gray-200">Proses Cepat</h4>
                            <p class="text-xs text-gray-500">Pendaftaran 100% online tanpa antre.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="mt-1 text-emerald-400"><i class="fa-solid fa-circle-check"></i></div>
                        <div>
                            <h4 class="text-sm font-semibold text-gray-200">Data Terenkripsi</h4>
                            <p class="text-xs text-gray-500">Informasi pribadi Anda dijamin keamanannya.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>