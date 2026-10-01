<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Pendaftaran Siswa</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($errors->any())
    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form action="{{ route('siswa.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block font-semibold mb-1">NISN</label>
                        <input type="text" name="nisn" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="w-full border p-2 rounded" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Asal Sekolah</label>
                        <input type="text" name="asal_sekolah" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Alamat</label>
                        <textarea name="alamat" class="w-full border p-2 rounded" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 font-semibold">Simpan Data</button>
                    <a href="{{ route('siswa.index') }}" class="text-gray-600 ml-3">Batal</a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>