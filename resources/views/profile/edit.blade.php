<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Portal PPDB</title>
    
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'sans-serif'] },
                    colors: {
                        primary: '#4F46E5', // Indigo
                        secondary: '#10B981', // Emerald
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
            overflow: hidden; 
        }

        /* Efek Kaca (Glassmorphism) */
        .glass-card {
            background: rgba(17, 24, 39, 0.65);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        /* Ornamen Cahaya Background */
        .glow-blob {
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(79,70,229,0.15) 0%, rgba(0,0,0,0) 70%);
            border-radius: 50%;
            filter: blur(50px);
            z-index: -1;
            animation: float-slow 12s infinite alternate;
        }
        .glow-blob.emerald {
            background: radial-gradient(circle, rgba(16,185,129,0.12) 0%, rgba(0,0,0,0) 70%);
            right: -100px;
            top: 10%;
            animation-duration: 15s;
        }
        .glow-blob.purple {
            background: radial-gradient(circle, rgba(147,51,234,0.12) 0%, rgba(0,0,0,0) 70%);
            left: -100px;
            bottom: -50px;
        }

        @keyframes float-slow {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(40px, -40px) scale(1.1); }
        }

        /* Animasi Fade In */
        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(15px);
        }
        @keyframes fadeIn {
            to { opacity: 1; transform: translateY(0); }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(75, 85, 99, 0.5); border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(107, 114, 128, 0.8); }

        /* Nav Link Active State */
        .nav-link.active {
            background: linear-gradient(90deg, rgba(79,70,229,0.2) 0%, rgba(0,0,0,0) 100%);
            border-left: 4px solid #4F46E5;
            color: #ffffff;
        }
    </style>
</head>
<body class="flex h-screen relative selection:bg-primary selection:text-white">

    <!-- Ornamen Background -->
    <div class="glow-blob purple"></div>
    <div class="glow-blob emerald"></div>

    <!-- Sidebar Kiri (Desktop) & Overlay (Mobile) -->
    <div id="mobile-overlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40 hidden md:hidden transition-opacity" onclick="toggleSidebar()"></div>
    
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-72 glass-card border-r border-gray-700/50 m-4 rounded-3xl flex flex-col transition-transform duration-300 transform -translate-x-full md:translate-x-0 md:relative md:m-4 md:mr-0">
        <!-- Header Sidebar (Logo) -->
        <div class="h-24 flex items-center px-8 border-b border-gray-700/50">
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary to-purple-600 flex items-center justify-center shadow-lg shadow-primary/30 group-hover:scale-105 transition-transform">
                    <i class="fa-solid fa-graduation-cap text-white text-lg"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold tracking-wider text-white">PORTAL<span class="text-primary">.</span></h2>
                    <p class="text-[10px] text-gray-400 font-medium uppercase tracking-widest">Siswa PPDB</p>
                </div>
            </a>
            <button onclick="toggleSidebar()" class="ml-auto md:hidden text-gray-400 hover:text-white">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>

        <!-- Menu Navigasi -->
        <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-2">
            <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Menu Utama</p>
            
            <a href="/dashboard" class="nav-link flex items-center gap-4 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 transition-all group">
                <i class="fa-solid fa-house text-lg w-6 text-center group-hover:text-primary transition-colors"></i>
                <span class="font-medium">Dashboard</span>
            </a>
            
            <a href="/pendaftaran" class="nav-link flex items-center gap-4 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 transition-all group">
                <i class="fa-solid fa-file-signature text-lg w-6 text-center group-hover:text-emerald-400 transition-colors"></i>
                <span class="font-medium">Isi Formulir</span>
            </a>
            
            <a href="#" class="nav-link flex items-center gap-4 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 transition-all group">
                <i class="fa-solid fa-print text-lg w-6 text-center group-hover:text-blue-400 transition-colors"></i>
                <span class="font-medium">Cetak Kartu</span>
            </a>
            
            <a href="/cek-status" class="nav-link flex items-center gap-4 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 transition-all group">
                <i class="fa-solid fa-magnifying-glass text-lg w-6 text-center group-hover:text-purple-400 transition-colors"></i>
                <span class="font-medium">Cek Status</span>
            </a>

            <div class="pt-6 mt-4 border-t border-gray-700/50"></div>
            <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Pengaturan</p>
            
            <a href="/profile" class="nav-link active flex items-center gap-4 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 transition-all group">
                <i class="fa-solid fa-user-gear text-lg w-6 text-center text-yellow-400 transition-colors"></i>
                <span class="font-medium">Edit Profile</span>
            </a>
        </nav>
    </aside>

    <!-- Area Konten Utama -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden relative z-10">
        <!-- Topbar Navbar -->
        <header class="h-20 glass-card mx-4 mt-4 rounded-2xl flex items-center justify-between px-4 sm:px-6 z-20 shrink-0">
            <button onclick="toggleSidebar()" class="md:hidden p-2 rounded-xl text-gray-300 hover:text-white hover:bg-white/10 transition-colors focus:outline-none">
                <i class="fa-solid fa-bars text-xl"></i>
            </button>

            <div class="hidden md:block">
                <h1 class="text-xl font-bold text-white">Pengaturan Akun</h1>
            </div>

            <!-- Profil & Logout -->
            <div class="flex items-center gap-4 sm:gap-6 ml-auto">
                <div class="flex items-center gap-3">
                    <div class="hidden sm:flex flex-col text-right">
                        <span class="text-sm font-bold text-white uppercase tracking-wide">{{ Auth::user()->name }}</span>
                        <span class="text-xs text-emerald-400 font-medium">Siswa Pendaftar</span>
                    </div>
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=4F46E5&color=fff&rounded=true&bold=true" alt="Avatar" class="w-10 h-10 rounded-full border-2 border-primary/50 p-0.5 shadow-lg">
                </div>

                <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                    @csrf
                    <button type="submit" class="p-2 sm:px-4 sm:py-2 rounded-xl bg-red-500/10 hover:bg-red-500/20 border border-red-500/20 text-red-400 transition-all group flex items-center gap-2">
                        <span class="text-sm font-bold hidden sm:block">Keluar</span>
                        <i class="fa-solid fa-right-from-bracket group-hover:translate-x-1 transition-transform"></i>
                    </button>
                </form>
            </div>
        </header>

        <!-- Main Content Ber-scroll -->
        <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
            <div class="max-w-4xl mx-auto space-y-6">

                <!-- 1. Form Update Info Profil -->
                <div class="glass-card rounded-3xl p-6 sm:p-8 animate-fade-in border-l-4 border-l-primary">
                    <header class="mb-6">
                        <h2 class="text-xl font-bold text-white flex items-center gap-2">
                            <i class="fa-regular fa-address-card text-primary"></i> Informasi Profil
                        </h2>
                        <p class="mt-1 text-sm text-gray-400">
                            Perbarui nama dan alamat email akun Anda di sini.
                        </p>
                    </header>

                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>

                    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Nama Lengkap</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fa-regular fa-user text-gray-500 group-focus-within:text-primary transition"></i>
                                </div>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"
                                    class="w-full bg-gray-900/50 border border-gray-700 text-white rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition shadow-inner">
                            </div>
                            @error('name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fa-regular fa-envelope text-gray-500 group-focus-within:text-primary transition"></i>
                                </div>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="username"
                                    class="w-full bg-gray-900/50 border border-gray-700 text-white rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition shadow-inner">
                            </div>
                            @error('email') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex items-center gap-4 pt-2">
                            <button type="submit" class="bg-primary hover:bg-indigo-500 text-white font-bold py-2.5 px-6 rounded-xl transition-all shadow-lg shadow-primary/30 flex items-center gap-2">
                                <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                            </button>

                            @if (session('status') === 'profile-updated')
                                <p class="text-sm text-emerald-400 flex items-center gap-1 animate-pulse">
                                    <i class="fa-solid fa-check-circle"></i> Berhasil disimpan.
                                </p>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- 2. Form Update Password -->
                <div class="glass-card rounded-3xl p-6 sm:p-8 animate-fade-in border-l-4 border-l-emerald-500" style="animation-delay: 0.1s;">
                    <header class="mb-6">
                        <h2 class="text-xl font-bold text-white flex items-center gap-2">
                            <i class="fa-solid fa-shield-halved text-emerald-500"></i> Perbarui Kata Sandi
                        </h2>
                        <p class="mt-1 text-sm text-gray-400">
                            Pastikan akun Anda menggunakan kata sandi panjang dan acak agar tetap aman.
                        </p>
                    </header>

                    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <label for="update_password_current_password" class="block text-sm font-medium text-gray-300 mb-2">Kata Sandi Saat Ini</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fa-solid fa-unlock-keyhole text-gray-500 group-focus-within:text-emerald-500 transition"></i>
                                </div>
                                <input type="password" id="update_password_current_password" name="current_password" autocomplete="current-password"
                                    class="w-full bg-gray-900/50 border border-gray-700 text-white rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition shadow-inner">
                            </div>
                            @error('current_password', 'updatePassword') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="update_password_password" class="block text-sm font-medium text-gray-300 mb-2">Kata Sandi Baru</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fa-solid fa-lock text-gray-500 group-focus-within:text-emerald-500 transition"></i>
                                </div>
                                <input type="password" id="update_password_password" name="password" autocomplete="new-password"
                                    class="w-full bg-gray-900/50 border border-gray-700 text-white rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition shadow-inner">
                            </div>
                            @error('password', 'updatePassword') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Konfirmasi Kata Sandi Baru</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fa-solid fa-check-double text-gray-500 group-focus-within:text-emerald-500 transition"></i>
                                </div>
                                <input type="password" id="update_password_password_confirmation" name="password_confirmation" autocomplete="new-password"
                                    class="w-full bg-gray-900/50 border border-gray-700 text-white rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition shadow-inner">
                            </div>
                            @error('password_confirmation', 'updatePassword') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex items-center gap-4 pt-2">
                            <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-2.5 px-6 rounded-xl transition-all shadow-lg shadow-emerald-600/30 flex items-center gap-2">
                                <i class="fa-solid fa-key"></i> Perbarui Sandi
                            </button>

                            @if (session('status') === 'password-updated')
                                <p class="text-sm text-emerald-400 flex items-center gap-1 animate-pulse">
                                    <i class="fa-solid fa-check-circle"></i> Sandi diperbarui.
                                </p>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- 3. Form Hapus Akun -->
                <div class="glass-card rounded-3xl p-6 sm:p-8 animate-fade-in border-l-4 border-l-red-500" style="animation-delay: 0.2s;">
                    <header class="mb-6">
                        <h2 class="text-xl font-bold text-white flex items-center gap-2">
                            <i class="fa-solid fa-triangle-exclamation text-red-500"></i> Hapus Akun
                        </h2>
                        <p class="mt-1 text-sm text-gray-400">
                            Setelah akun Anda dihapus, semua sumber daya dan data pendaftaran akan dihapus secara permanen.
                        </p>
                    </header>

                    <!-- Tombol Pemicu Modal (Kita gunakan form sederhana agar aman tanpa Alpine.js rumit) -->
                    <form method="post" action="{{ route('profile.destroy') }}" class="space-y-6" onsubmit="return confirm('Peringatan!\n\nApakah Anda yakin ingin menghapus akun ini? Semua data pendaftaran Anda akan HILANG secara permanen.');">
                        @csrf
                        @method('delete')
                        
                        <div class="bg-red-500/10 border border-red-500/20 p-4 rounded-xl mb-4">
                            <label for="password_delete" class="block text-sm font-medium text-red-400 mb-2">Masukkan kata sandi Anda untuk mengonfirmasi penghapusan:</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fa-solid fa-lock text-red-500/50 group-focus-within:text-red-500 transition"></i>
                                </div>
                                <input type="password" id="password_delete" name="password" placeholder="Kata Sandi" required
                                    class="w-full bg-gray-900/50 border border-red-500/30 text-white rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition shadow-inner">
                            </div>
                            @error('password', 'userDeletion') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit" class="bg-red-600/80 hover:bg-red-500 text-white font-bold py-2.5 px-6 rounded-xl transition-all shadow-lg shadow-red-600/30 flex items-center gap-2 border border-red-500/50">
                            <i class="fa-solid fa-trash-can"></i> Hapus Akun Saya
                        </button>
                    </form>
                </div>

            </div>
            
            <div class="max-w-4xl mx-auto mt-12 pt-6 border-t border-gray-800 text-center flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500 pb-8">
                <p>&copy; 2026 Portal PPDB Online.</p>
            </div>
        </main>
    </div>

    <!-- Script Interaksi Sidebar -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('mobile-overlay');

        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            
            if (overlay.classList.contains('hidden')) {
                overlay.classList.remove('hidden');
                setTimeout(() => {
                    overlay.classList.remove('opacity-0');
                    overlay.classList.add('opacity-100');
                }, 10);
            } else {
                overlay.classList.remove('opacity-100');
                overlay.classList.add('opacity-0');
                setTimeout(() => {
                    overlay.classList.add('hidden');
                }, 300);
            }
        }
    </script>
</body>
</html>