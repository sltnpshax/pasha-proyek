<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Data Siswa</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block font-semibold mb-1">NISN</label>
                        <input type="text" name="nisn" value="{{ $siswa->nisn }}" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="{{ $siswa->nama_lengkap }}" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="w-full border p-2 rounded" required>
                            <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Asal Sekolah</label>
                        <input type="text" name="asal_sekolah" value="{{ $siswa->asal_sekolah }}" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Alamat</label>
                        <textarea name="alamat" class="w-full border p-2 rounded" rows="3" required>{{ $siswa->alamat }}</textarea>
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-semibold">Update Data</button>
                    <a href="{{ route('siswa.index') }}" class="text-gray-600 ml-3">Batal</a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>