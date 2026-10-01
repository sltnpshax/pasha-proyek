<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Pendaftaran Siswa</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if(session('success'))
                    <div class="bg-green-100 text-green-800 p-3 rounded mb-4 font-semibold">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('siswa.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-semibold inline-block mb-4">+ Tambah Siswa</a>

                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="border p-2">NISN</th>
                            <th class="border p-2">Nama Lengkap</th>
                            <th class="border p-2">JK</th>
                            <th class="border p-2">Asal Sekolah</th>
                            <th class="border p-2">Alamat</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($siswa as $item)
                            <tr>
                                <td class="border p-2">{{ $item->nisn }}</td>
                                <td class="border p-2">{{ $item->nama_lengkap }}</td>
                                <td class="border p-2">{{ $item->jenis_kelamin }}</td>
                                <td class="border p-2">{{ $item->asal_sekolah }}</td>
                                <td class="border p-2">{{ $item->alamat }}</td>
                                <td class="border p-2">
                                    <a href="{{ route('siswa.edit', $item->id) }}" class="text-yellow-600 font-semibold mr-2">Edit</a>
                                    <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin hapus data?')" class="text-red-600 font-semibold">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="border p-4 text-center text-gray-500">Belum ada data pendaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>