<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Portal PPDB</title>
    
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Konfigurasi Custom Tailwind & CSS -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'sans-serif'] },
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
            background: linear-gradient(to right, #60A5FA, #A78BFA);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Ornamen Cahaya Background */
        .glow-blob {
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(79,70,229,0.3) 0%, rgba(0,0,0,0) 70%);
            border-radius: 50%;
            filter: blur(50px);
            z-index: -1;
            animation: float-slow 10s infinite alternate;
        }
        .glow-blob.secondary {
            background: radial-gradient(circle, rgba(16,185,129,0.2) 0%, rgba(0,0,0,0) 70%);
            right: -100px;
            bottom: -100px;
            animation-duration: 12s;
        }
        .glow-blob.purple {
            background: radial-gradient(circle, rgba(147,51,234,0.2) 0%, rgba(0,0,0,0) 70%);
            left: -100px;
            top: 20%;
        }

        /* Animasi Mengambang */
        @keyframes float-slow {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(30px, -50px) scale(1.1); }
        }

        /* Animasi Fade In */
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }
        @keyframes fadeIn {
            to { opacity: 1; transform: translateY(0); }
        }

        /* Custom Checkbox */
        .custom-checkbox:checked {
            background-color: #4F46E5;
            border-color: #4F46E5;
        }
    </style>
</head>
<body class="flex items-center justify-center relative overflow-hidden">

    <!-- Ornamen Latar Belakang -->
    <div class="glow-blob purple"></div>
    <div class="glow-blob secondary"></div>

    <!-- Container Utama -->
    <div class="w-full max-w-5xl px-6 flex items-center justify-center relative z-10 animate-fade-in py-12">
        
        <!-- Tombol Kembali (Absolute di pojok) -->
        <a href="{{ url('/') }}" class="absolute top-0 left-6 text-gray-400 hover:text-white transition flex items-center gap-2 group mt-6 md:mt-0">
            <div class="bg-gray-800/50 group-hover:bg-primary/20 p-2 rounded-full transition">
                <i class="fa-solid fa-arrow-left text-sm group-hover:text-primary transition"></i>
            </div>
            <span class="font-medium text-sm">Kembali</span>
        </a>

        <!-- Grid Layout (Kiri Info, Kanan Form) -->
        <div class="glass-card w-full rounded-3xl overflow-hidden grid md:grid-cols-2 shadow-2xl">
            
            <!-- Bagian Kiri (Informasi / Banner) -->
            <div class="hidden md:flex flex-col justify-center p-12 relative bg-gradient-to-br from-primary/10 to-transparent border-r border-white/5">
                <!-- Elemen Dekoratif -->
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary to-transparent"></div>
                
                <div class="inline-flex items-center gap-3 mb-6">
                    <div class="bg-primary/20 p-3 rounded-2xl text-primary text-2xl shadow-lg shadow-primary/20">
                       <img src="{{ asset('https://ppsmk.dindik.jatimprov.go.id/aksibisa/uploads/sekolah/20240801_e95a42050f80933.webp') }}" alt="Logo SMK PGRI 2" class="h-10 w-auto mr-3">
                    </div>
                    <span class="text-xl font-bold tracking-wider">SMKS PGRI 2 PONOROGO.</span>
                </div>

                <h1 class="text-4xl font-extrabold mb-4 leading-tight">
                    Selamat Datang <br>
                    <span class="text-gradient">Kembali!</span>
                </h1>
                
                <p class="text-gray-400 leading-relaxed mb-8">
                    Silakan masuk menggunakan email dan kata sandi yang telah Anda daftarkan untuk melanjutkan proses pendaftaran atau melihat status kelulusan.
                </p>

                <div class="flex items-center gap-4 text-sm font-medium text-gray-500">
                    <div class="flex -space-x-3">
                        <img class="w-8 h-8 rounded-full border-2 border-dark" src="https://ui-avatars.com/api/?name=Siswa+1&background=random" alt="User">
                        <img class="w-8 h-8 rounded-full border-2 border-dark" src="https://ui-avatars.com/api/?name=Siswa+2&background=random" alt="User">
                        <img class="w-8 h-8 rounded-full border-2 border-dark" src="https://ui-avatars.com/api/?name=Siswa+3&background=random" alt="User">
                    </div>
                    <span>Bergabung bersama 1,245+ siswa lainnya</span>
                </div>
            </div>

            <!-- Bagian Kanan (Form Login) -->
            <div class="p-8 md:p-12 flex flex-col justify-center">
                
                <div class="text-center md:text-left mb-8">
                    <h2 class="text-2xl font-bold text-white mb-2">Masuk ke Akun</h2>
                    <p class="text-gray-400 text-sm">Masukkan detail kredensial Anda di bawah ini.</p>
                </div>

                <!-- Session Status (Jika ada pesan reset password) -->
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-400 bg-green-400/10 p-3 rounded-lg border border-green-400/20">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Form Utama Laravel -->
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Input Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-1.5">Email Aktif</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition">
                                <i class="fa-regular fa-envelope text-gray-500 group-focus-within:text-primary transition"></i>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                class="w-full bg-gray-900/50 border border-gray-700 text-white rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition placeholder-gray-600 shadow-inner">
                        </div>
                        @error('email')
                            <p class="text-red-400 text-xs mt-1.5 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Input Password -->
                    <div>
                        <div class="flex justify-between items-center mb-1.5">
                            <label for="password" class="block text-sm font-medium text-gray-300">Kata Sandi</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs text-primary hover:text-blue-400 transition font-medium">Lupa sandi?</a>
                            @endif
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition">
                                <i class="fa-solid fa-lock text-gray-500 group-focus-within:text-primary transition"></i>
                            </div>
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                class="w-full bg-gray-900/50 border border-gray-700 text-white rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition placeholder-gray-600 shadow-inner">
                        </div>
                        @error('password')
                            <p class="text-red-400 text-xs mt-1.5 flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" class="custom-checkbox w-4 h-4 rounded border-gray-600 bg-gray-800 text-primary focus:ring-primary focus:ring-offset-gray-900">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-400 select-none cursor-pointer">
                            Ingat saya
                        </label>
                    </div>

                    <!-- Tombol Login -->
                    <button type="submit" class="w-full font-bold text-white bg-gradient-to-r from-primary to-purple-600 hover:from-primary hover:to-primary py-3.5 rounded-xl transition-all shadow-lg shadow-primary/30 transform hover:-translate-y-1 flex justify-center items-center gap-2 mt-2">
                        Masuk Sekarang <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    </button>
                    
                    <!-- Link Register -->
                    @if (Route::has('register'))
                        <p class="text-center text-sm text-gray-400 mt-6">
                            Belum punya akun? 
                            <a href="{{ route('register') }}" class="text-white font-semibold hover:text-primary transition border-b border-dashed border-gray-500 hover:border-primary pb-0.5">Daftar Sekarang</a>
                        </p>
                    @endif
                </form>

            </div>
        </div>
    </div>

</body>
</html>