<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa - Portal PPDB</title>
    
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
            overflow: hidden; /* Mencegah scroll di body, scroll di handle oleh main tag */
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
            animation: fadeIn 0.8s ease-out forwards;
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

        /* Teks Gradasi */
        .text-gradient {
            background: linear-gradient(to right, #60A5FA, #34D399);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

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
            <!-- Tombol Close Mobile -->
            <button onclick="toggleSidebar()" class="ml-auto md:hidden text-gray-400 hover:text-white">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>

        <!-- Menu Navigasi -->
        <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-2">
            <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Menu Utama</p>
            
            <a href="/dashboard" class="nav-link active flex items-center gap-4 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 transition-all group">
                <i class="fa-solid fa-house text-lg w-6 text-center group-hover:text-primary transition-colors text-primary"></i>
                <span class="font-medium">Dashboard</span>
            </a>
            
            <a href="/pendaftaran" class="nav-link flex items-center gap-4 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 transition-all group">
                <i class="fa-solid fa-file-signature text-lg w-6 text-center group-hover:text-emerald-400 transition-colors"></i>
                <span class="font-medium">Isi Formulir</span>
            </a>
            
            <!-- Tambahan menu yang relevan -->
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
            
            <a href="/profile" class="nav-link flex items-center gap-4 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 transition-all group">
                <i class="fa-solid fa-user-gear text-lg w-6 text-center group-hover:text-yellow-400 transition-colors"></i>
                <span class="font-medium">Edit Profile</span>
            </a>
        </nav>

        <!-- Informasi Tambahan Bawah -->
        <div class="p-6 border-t border-gray-700/50">
            <div class="bg-gray-800/50 rounded-2xl p-4 border border-gray-700 relative overflow-hidden group">
                <div class="absolute -right-4 -top-4 w-16 h-16 bg-primary/20 rounded-full blur-xl group-hover:bg-primary/40 transition-all"></div>
                <div class="flex items-center gap-3 mb-2">
                    <i class="fa-solid fa-headset text-primary text-xl"></i>
                    <h4 class="text-sm font-bold text-white">Butuh Bantuan?</h4>
                </div>
                <p class="text-xs text-gray-400 mb-3">Hubungi panitia PPDB jika mengalami kendala.</p>
                <a href="#" class="block text-center text-xs font-bold bg-white/10 hover:bg-white/20 text-white py-2 rounded-lg transition-colors border border-white/5">
                    Hubungi Panitia
                </a>
            </div>
        </div>
    </aside>

    <!-- Area Konten Utama -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden relative z-10">
        
        <!-- Topbar Navbar -->
        <header class="h-20 glass-card mx-4 mt-4 rounded-2xl flex items-center justify-between px-4 sm:px-6 z-20 shrink-0">
            <!-- Tombol Hamburger (Mobile) -->
            <button onclick="toggleSidebar()" class="md:hidden p-2 rounded-xl text-gray-300 hover:text-white hover:bg-white/10 transition-colors focus:outline-none">
                <i class="fa-solid fa-bars text-xl"></i>
            </button>

            <!-- Judul Halaman (Desktop) -->
            <div class="hidden md:block">
                <h1 class="text-xl font-bold text-white">Ikhtisar Panel</h1>
            </div>

            <!-- Profil & Logout Kanan -->
            <div class="flex items-center gap-4 sm:gap-6 ml-auto">
                <!-- Notifikasi -->
                <button class="relative p-2 text-gray-400 hover:text-white transition-colors group">
                    <i class="fa-regular fa-bell text-xl group-hover:animate-swing"></i>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full border border-gray-900"></span>
                </button>

                <div class="w-px h-8 bg-gray-700/50 hidden sm:block"></div>

                <!-- Profil User -->
                <div class="flex items-center gap-3">
                    <div class="hidden sm:flex flex-col text-right">
                        <!-- Defaulting to user name or fallback -->
                        <span class="text-sm font-bold text-white uppercase tracking-wide">{{ Auth::user()->name ?? 'Siswa Pendaftar' }}</span>
                        <span class="text-xs text-emerald-400 font-medium">Akun Aktif</span>
                    </div>
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Siswa') }}&background=4F46E5&color=fff&rounded=true&bold=true" alt="Avatar" class="w-10 h-10 rounded-full border-2 border-primary/50 p-0.5 shadow-lg">
                </div>

                <!-- Tombol Logout -->
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
            <div class="max-w-7xl mx-auto space-y-6">
                
                <!-- Banner Sambutan Mewah -->
                <div class="glass-card rounded-3xl p-8 relative overflow-hidden animate-fade-in group border-l-4 border-l-emerald-400">
                    <!-- Ornamen Banner Kanan -->
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-gradient-to-br from-emerald-500/20 to-primary/20 rounded-full blur-3xl group-hover:scale-110 transition-transform duration-700"></div>
                    <i class="fa-solid fa-hand-sparkles absolute right-8 bottom-8 text-8xl text-white/5 transform -rotate-12 group-hover:rotate-0 transition-transform duration-500"></i>

                    <div class="relative z-10">
                        <span class="inline-flex items-center gap-1.5 py-1 px-3 rounded-full bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 text-xs font-bold mb-4">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span> Sistem Terhubung
                        </span>
                        
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-2 tracking-tight">
                            Selamat Datang, <br class="sm:hidden" /> <span class="text-gradient">{{ Auth::user()->name ?? 'Siswa Pendaftar' }}</span>!
                        </h2>
                        <p class="text-gray-400 max-w-2xl text-sm sm:text-base leading-relaxed">
                            Ini adalah halaman portal resmi Anda. Silakan lengkapi formulir pendaftaran dan pantau terus status kelulusan Anda melalui menu yang tersedia di sebelah kiri.
                        </p>

                        <!-- Tombol Aksi Cepat -->
                        <div class="mt-6 flex flex-wrap gap-4">
                            <a href="/pendaftaran" class="bg-gradient-to-r from-primary to-indigo-500 hover:from-primary/90 hover:to-indigo-500/90 text-white font-semibold py-2.5 px-6 rounded-xl shadow-lg shadow-primary/30 flex items-center gap-2 transition-all transform hover:-translate-y-0.5">
                                <i class="fa-solid fa-pen-to-square"></i> Mulai Isi Formulir
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Info Grid (Langkah-langkah) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 animate-fade-in" style="animation-delay: 0.1s;">
                    
                    <!-- Step 1 -->
                    <div class="bg-gray-800/40 backdrop-blur-md rounded-2xl p-6 border border-gray-700 hover:border-primary/50 transition-colors group">
                        <div class="w-12 h-12 rounded-full bg-blue-500/20 flex items-center justify-center text-blue-400 text-xl mb-4 group-hover:bg-blue-500/30 group-hover:scale-110 transition-all">
                            <i class="fa-solid fa-1"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Lengkapi Data</h3>
                        <p class="text-sm text-gray-400">Pastikan seluruh data diri dan NISN terisi dengan benar pada menu Formulir.</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="bg-gray-800/40 backdrop-blur-md rounded-2xl p-6 border border-gray-700 hover:border-emerald-500/50 transition-colors group">
                        <div class="w-12 h-12 rounded-full bg-emerald-500/20 flex items-center justify-center text-emerald-400 text-xl mb-4 group-hover:bg-emerald-500/30 group-hover:scale-110 transition-all">
                            <i class="fa-solid fa-2"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Cetak Kartu</h3>
                        <p class="text-sm text-gray-400">Setelah data tersimpan, cetak kartu bukti pendaftaran berformat PDF.</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="bg-gray-800/40 backdrop-blur-md rounded-2xl p-6 border border-gray-700 hover:border-purple-500/50 transition-colors group">
                        <div class="w-12 h-12 rounded-full bg-purple-500/20 flex items-center justify-center text-purple-400 text-xl mb-4 group-hover:bg-purple-500/30 group-hover:scale-110 transition-all">
                            <i class="fa-solid fa-3"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Pantau Status</h3>
                        <p class="text-sm text-gray-400">Tunggu proses seleksi oleh panitia dan cek status kelulusan Anda secara berkala.</p>
                    </div>

                </div>

            </div>
            
            <!-- Footer Dashboard -->
            <div class="max-w-7xl mx-auto mt-12 pt-6 border-t border-gray-800 text-center md:text-left flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500 pb-8">
                <p>&copy; 2026 Portal PPDB Online. All rights reserved.</p>
                <div class="flex gap-4">
                    <a href="#" class="hover:text-gray-300 transition-colors">Syarat & Ketentuan</a>
                    <a href="#" class="hover:text-gray-300 transition-colors">Bantuan</a>
                </div>
            </div>
        </main>
    </div>

    <!-- Script Interaksi -->
    <script>
        // Fungsi untuk membuka/tutup sidebar di layar Mobile (HP)
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('mobile-overlay');

        function toggleSidebar() {
            // Toggle translate class untuk Sidebar
            sidebar.classList.toggle('-translate-x-full');
            
            // Toggle opacity dan visibility untuk Overlay
            if (overlay.classList.contains('hidden')) {
                overlay.classList.remove('hidden');
                // Timeout kecil agar transisi opacity terlihat mulus
                setTimeout(() => {
                    overlay.classList.remove('opacity-0');
                    overlay.classList.add('opacity-100');
                }, 10);
            } else {
                overlay.classList.remove('opacity-100');
                overlay.classList.add('opacity-0');
                setTimeout(() => {
                    overlay.classList.add('hidden');
                }, 300); // Sesuai durasi transisi di Tailwind
            }
        }
    </script>
</body>
</html>