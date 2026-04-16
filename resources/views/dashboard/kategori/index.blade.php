<x-layout.sidebar>

    <h1 class="text-2xl font-bold mb-4">Data Kategori</h1>

    {{-- FORM TAMBAH --}}
    <form action="{{ route('kategori.store') }}" method="POST" class="mb-4 flex gap-2">
        @csrf
        <input 
            type="text" 
            name="nama_kategori" 
            placeholder="Nama Kategori"
            class="border p-2 rounded w-full"
            required
        >

        <input type="hidden" name="usaha_id" value="1">

        <button 
            type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded"
        >
            + Tambah
        </button>
    </form>

    {{-- TABEL --}}
    <table class="w-full bg-white shadow rounded overflow-hidden">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-3">No</th>
                <th class="p-3">Nama Kategori</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategori as $item)
            <tr class="border-t hover:bg-gray-50">
                <td class="p-3">{{ $loop->iteration }}</td>
                <td class="p-3">{{ $item->nama_kategori }}</td>
                <td class="p-3 flex gap-2">

                    {{-- EDIT --}}
                    <a href="{{ route('kategori.edit', $item->id) }}" 
                       class="text-blue-500 hover:underline">
                        Edit
                    </a>

                    {{-- DELETE --}}
                    <form action="{{ route('kategori.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button 
                            onclick="return confirm('Yakin hapus?')" 
                            class="text-red-500 hover:underline"
                        >
                            Hapus
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach

            @if($kategori->isEmpty())
            <tr>
                <td colspan="3" class="p-3 text-center text-gray-500">
                    Data kategori belum ada
                </td>
            </tr>
            @endif

        </tbody>
    </table>

</x-layout.sidebar>