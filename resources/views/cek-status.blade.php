<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<!-- Tailwind CSS via CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Konfigurasi Custom Tailwind & CSS Tambahan (Sama dengan Beranda) -->
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
        font-family: 'Poppins', sans-serif;
    }
    
    .glass {
        background: rgba(17, 24, 39, 0.7);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .text-gradient {
        background: linear-gradient(to right, #60A5FA, #A78BFA, #34D399);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .glow-blob {
        position: absolute;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(79,70,229,0.3) 0%, rgba(0,0,0,0) 70%);
        border-radius: 50%;
        filter: blur(40px);
        z-index: -1;
        animation: pulse 8s infinite alternate;
    }
    .glow-blob.secondary {
        background: radial-gradient(circle, rgba(16,185,129,0.2) 0%, rgba(0,0,0,0) 70%);
        right: 0;
        bottom: 0;
    }
    @keyframes pulse {
        0% { transform: scale(1); opacity: 0.5; }
        100% { transform: scale(1.5); opacity: 1; }
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }
</style>

<div class="min-h-screen relative flex items-center justify-center p-4 overflow-hidden">
    <!-- Ornamen Latar Belakang -->
    <div class="glow-blob top-10 left-10"></div>
    <div class="glow-blob secondary bottom-10 right-10"></div>

    <!-- Kotak Utama (Card Glassmorphism) -->
    <div class="glass p-8 md:p-10 rounded-3xl w-full max-w-lg relative z-10 shadow-2xl border border-white/10 animate-fade-in">
        
        <!-- Tombol Kembali -->
        <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-gray-400 hover:text-white mb-8 transition group">
            <div class="bg-gray-800/50 group-hover:bg-primary/20 p-2 rounded-full transition">
                <i class="fa-solid fa-arrow-left text-sm group-hover:text-primary transition"></i>
            </div>
            <span class="font-medium text-sm">Kembali ke Beranda</span>
        </a>

        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center h-16 w-16 rounded-2xl bg-primary/20 text-primary mb-4 shadow-lg shadow-primary/20 transform rotate-3">
                <i class="fa-solid fa-magnifying-glass text-2xl transform -rotate-3"></i>
            </div>
            <h1 class="text-3xl font-bold tracking-tight mb-2">Portal Cek Status <span class="text-gradient">PPDB</span></h1>
            <p class="text-gray-400 text-sm">Masukkan NISN atau Nama Lengkap kamu pada kolom di bawah ini untuk melihat status kelulusan.</p>
        </div>

        <!-- Form Pencarian -->
        <!-- PASTIKAN name="search" ATAU SESUAIKAN DENGAN NAMA VARIABEL DI CONTROLLER KAMU -->
        <form action="{{ route('cek-status.search') }}" method="POST">
            @csrf
            <div class="mb-6 relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition group-focus-within:text-primary">
                    <i class="fa-regular fa-id-card text-gray-400 group-focus-within:text-primary transition"></i>
                </div>
                <input type="text" name="keyword" placeholder="Contoh: 1234567890 atau Pasha" required
                    class="w-full bg-gray-900/50 border border-gray-700 text-white rounded-xl pl-11 pr-4 py-4 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition placeholder-gray-500 shadow-inner text-sm md:text-base">
            </div>

            <button type="submit" class="w-full font-bold text-white bg-gradient-to-r from-primary to-purple-600 hover:from-primary hover:to-primary py-4 rounded-xl transition shadow-lg shadow-primary/30 transform hover:-translate-y-1 flex justify-center items-center gap-2">
                Cari Data Siswa <i class="fa-solid fa-arrow-right"></i>
            </button>
        </form>

        <!-- Pesan Error (Jika data tidak ditemukan) -->
        @if(session('error'))
            <div class="mt-6 bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-xl flex items-center gap-3 animate-fade-in">
                <i class="fa-solid fa-circle-exclamation text-xl"></i>
                <p class="text-sm">{{ session('error') }}</p>
            </div>
        @endif

        <!-- Menampilkan Hasil Pencarian (Jika data ditemukan) -->
        <!-- Asumsi variabel yang dilempar dari controller adalah $siswa -->
        @if(isset($siswa))
            <div class="mt-8 border-t border-gray-700/50 pt-6 animate-fade-in">
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4">Hasil Pencarian</h3>
                
                <div class="bg-gray-800/50 rounded-2xl p-5 border border-gray-700">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-xl font-bold text-white">{{ $siswa->nama_lengkap }}</p>
                            <p class="text-sm text-gray-400">NISN: {{ $siswa->nisn }}</p>
                        </div>
                        
                        <!-- Badge Status -->
                        @if($siswa->status == 'Lulus' || $siswa->status == 'Diterima')
                            <span class="bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1">
                                <i class="fa-solid fa-check-circle"></i> Diterima
                            </span>
                        @elseif($siswa->status == 'Ditolak' || $siswa->status == 'Tidak Lulus')
                            <span class="bg-red-500/20 text-red-400 border border-red-500/30 px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1">
                                <i class="fa-solid fa-times-circle"></i> Ditolak
                            </span>
                        @else
                            <span class="bg-yellow-500/20 text-yellow-400 border border-yellow-500/30 px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1">
                                <i class="fa-solid fa-clock"></i> Diproses
                            </span>
                        @endif
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mt-4 pt-4 border-t border-gray-700/50">
                        <div>
                            <p class="text-xs text-gray-500">Asal Sekolah</p>
                            <p class="text-sm font-medium text-gray-300">{{ $siswa->asal_sekolah }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Jenis Kelamin</p>
                            <p class="text-sm font-medium text-gray-300">{{ $siswa->jenis_kelamin }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>