<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Siswa - Portal PPDB</title>
    
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

        /* Ornamen Cahaya Background */
        .glow-blob {
            position: fixed;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(79,70,229,0.2) 0%, rgba(0,0,0,0) 70%);
            border-radius: 50%;
            filter: blur(50px);
            z-index: -1;
            animation: float-slow 12s infinite alternate;
        }
        .glow-blob.emerald {
            background: radial-gradient(circle, rgba(16,185,129,0.15) 0%, rgba(0,0,0,0) 70%);
            right: -100px;
            top: 20%;
            animation-duration: 15s;
        }
        .glow-blob.blue {
            background: radial-gradient(circle, rgba(59,130,246,0.15) 0%, rgba(0,0,0,0) 70%);
            left: -100px;
            bottom: -50px;
        }

        @keyframes float-slow {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(30px, -30px) scale(1.1); }
        }

        /* Custom Scrollbar untuk Textarea & Select */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #1f2937;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb {
            background: #4b5563;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #6b7280;
        }

        /* Styling Dropdown Options agar terbaca di dark mode */
        select option {
            background-color: #111827; /* gray-900 */
            color: white;
            padding: 10px;
        }
    </style>
</head>
<body class="flex flex-col items-center justify-center relative py-12 px-4 sm:px-6">

    <!-- Ornamen Latar Belakang -->
    <div class="glow-blob blue"></div>
    <div class="glow-blob emerald"></div>

    <!-- Container Utama Form -->
    <div class="w-full max-w-3xl glass-card rounded-3xl overflow-hidden relative z-10 shadow-2xl animate-fade-in">
        
        <!-- Header Card -->
        <div class="border-b border-gray-700/50 p-6 md:p-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-gray-800/30">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-white flex items-center gap-3">
                    <i class="fa-solid fa-file-signature text-primary"></i>
                    Form Pendaftaran
                </h1>
                <p class="text-gray-400 text-sm mt-1">Lengkapi data diri Anda di bawah ini dengan benar.</p>
            </div>
            
            <!-- Tombol Ke Dashboard -->
            <a href="/dashboard" class="inline-flex items-center gap-2 bg-emerald-500/10 hover:bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-4 py-2 rounded-xl transition-all font-medium text-sm shadow-lg shadow-emerald-500/10 hover:shadow-emerald-500/20 whitespace-nowrap">
                <i class="fa-solid fa-house-user"></i> Ke Dashboard
            </a>
        </div>

        <!-- Area Form -->
        <div class="p-6 md:p-8">
            <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf <!-- Laravel CSRF Token -->

                <!-- Input NISN -->
                <div>
                    <label for="nisn" class="block text-sm font-medium text-gray-300 mb-2">NISN</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-id-badge text-gray-500 group-focus-within:text-primary transition"></i>
                        </div>
                        <input type="number" id="nisn" name="nisn" placeholder="Masukkan Nomor Induk Siswa Nasional" required
                            class="w-full bg-gray-900/50 border border-gray-700 text-white rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition placeholder-gray-600 shadow-inner">
                    </div>
                </div>

                <!-- Input Nama Lengkap -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-300 mb-2">Nama Lengkap</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-regular fa-user text-gray-500 group-focus-within:text-primary transition"></i>
                        </div>
                        <input type="text" id="nama" name="nama" placeholder="Sesuai dengan Ijazah / Akta Kelahiran" required
                            class="w-full bg-gray-900/50 border border-gray-700 text-white rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition placeholder-gray-600 shadow-inner">
                    </div>
                </div>

                <!-- Input Jenis Kelamin -->
                <div>
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-300 mb-2">Jenis Kelamin</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-venus-mars text-gray-500 group-focus-within:text-primary transition"></i>
                        </div>
                        <!-- Appearance-none untuk menghilangkan panah bawaan browser agar bisa dicustom jika perlu, tapi Tailwind form plugin biasanya menangani ini. Kita biarkan default dulu agar aman. -->
                        <select id="jenis_kelamin" name="jenis_kelamin" required
                            class="w-full bg-gray-900/50 border border-gray-700 text-white rounded-xl pl-11 pr-10 py-3 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition shadow-inner appearance-none cursor-pointer">
                            <option value="" disabled selected class="text-gray-500">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <!-- Custom Arrow Icon -->
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-chevron-down text-gray-500 text-sm"></i>
                        </div>
                    </div>
                </div>

                <!-- Input Asal Sekolah -->
                <div>
                    <label for="asal_sekolah" class="block text-sm font-medium text-gray-300 mb-2">Asal Sekolah</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-school text-gray-500 group-focus-within:text-primary transition"></i>
                        </div>
                        <input type="text" id="asal_sekolah" name="asal_sekolah" placeholder="Nama SMP/MTs asal" required
                            class="w-full bg-gray-900/50 border border-gray-700 text-white rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition placeholder-gray-600 shadow-inner">
                    </div>
                </div>

                <!-- Input Alamat -->
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-300 mb-2">Alamat Lengkap</label>
                    <div class="relative group">
                        <div class="absolute top-4 left-4 flex items-start pointer-events-none">
                            <i class="fa-solid fa-map-location-dot text-gray-500 group-focus-within:text-primary transition"></i>
                        </div>
                        <textarea id="alamat" name="alamat" rows="4" placeholder="Masukkan alamat lengkap (Jalan, RT/RW, Desa, Kecamatan)" required
                            class="w-full bg-gray-900/50 border border-gray-700 text-white rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition placeholder-gray-600 shadow-inner resize-y"></textarea>
                    </div>
                </div>

                <!-- Input Foto Siswa -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Foto Siswa</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-700 border-dashed rounded-xl hover:border-primary/50 transition-colors bg-gray-900/30 group">
                        <div class="space-y-2 text-center">
                            <i class="fa-regular fa-image text-4xl text-gray-500 group-hover:text-primary transition"></i>
                            <div class="flex text-sm text-gray-400 justify-center">
                                <label for="foto" class="relative cursor-pointer bg-primary/20 hover:bg-primary/30 text-primary px-3 py-1 rounded-md font-medium transition-colors focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary focus-within:ring-offset-gray-900">
                                    <span>Pilih File</span>
                                    <input id="foto" name="foto" type="file" class="sr-only" accept="image/*">
                                </label>
                                <p class="pl-2 pt-1">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">
                                PNG, JPG, JPEG (Maks. 2MB)
                            </p>
                        </div>
                    </div>
                    <!-- Alternatif File Input Native dengan styling Tailwind -->
                    <!-- <input class="block w-full text-sm text-gray-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-primary/20 file:text-primary hover:file:bg-primary/30 transition bg-gray-900/50 border border-gray-700 rounded-xl cursor-pointer" id="foto" type="file"> -->
                </div>

                <!-- Tombol Submit -->
                <div class="pt-4 border-t border-gray-700/50">
                    <button type="submit" class="w-full font-bold text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 py-4 rounded-xl transition-all shadow-lg shadow-blue-500/30 transform hover:-translate-y-1 flex justify-center items-center gap-2 text-lg">
                        <i class="fa-solid fa-paper-plane"></i> Kirim Pendaftaran
                    </button>
                    <p class="text-center text-xs text-gray-500 mt-4">
                        <i class="fa-solid fa-shield-halved text-emerald-500 mr-1"></i> Data Anda dienkripsi dan disimpan dengan aman.
                    </p>
                </div>

            </form>
        </div>
    </div>

    <!-- Script sederhana untuk menampilkan nama file yang dipilih (Opsional) -->
    <script>
        const fileInput = document.getElementById('foto');
        const dropZoneText = fileInput.parentElement.nextElementSibling;
        
        fileInput.addEventListener('change', function(e) {
            if(e.target.files.length > 0) {
                const fileName = e.target.files[0].name;
                dropZoneText.innerHTML = `File terpilih: <span class="text-white font-medium">${fileName}</span>`;
            } else {
                dropZoneText.textContent = "atau drag and drop";
            }
        });
    </script>
</body>
</html>