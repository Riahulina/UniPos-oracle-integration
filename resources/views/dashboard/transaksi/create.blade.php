<x-layout.sidebar>

    <h1 class="text-2xl font-bold mb-4">Tambah Transaksi</h1>

    <form action="{{ route('transaksi.store') }}" method="POST" class="bg-white p-4 rounded shadow max-w-md">
        @csrf

        <div class="mb-3">
            <label>Total</label>
            <input type="number" name="total" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-3">
            <label>Bayar</label>
            <input type="number" name="bayar" class="w-full border p-2 rounded" required>
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>

</x-layout.sidebar>