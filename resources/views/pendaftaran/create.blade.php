<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Formulir Pendaftaran Siswa</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">NISN</label>
                <input type="text" name="nisn" required class="mt-1 w-full border border-gray-300 rounded p-2">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" required class="mt-1 w-full border border-gray-300 rounded p-2">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <select name="jenis_kelamin" required class="mt-1 w-full border border-gray-300 rounded p-2">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" required class="mt-1 w-full border border-gray-300 rounded p-2">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea name="alamat" required class="mt-1 w-full border border-gray-300 rounded p-2"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Foto Siswa</label>
                <input type="file" name="foto" accept="image/*" class="mt-1 w-full">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Kirim Pendaftaran
            </button>

        </form>
    </div>
</body>
</html>