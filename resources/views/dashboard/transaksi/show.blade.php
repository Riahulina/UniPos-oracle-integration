<x-layout.sidebar>

    <h1 class="text-2xl font-bold mb-4">Detail Transaksi</h1>

    <div class="bg-white p-4 rounded shadow max-w-md">

        <p>Total: Rp {{ number_format($transaksi->total) }}</p>
        <p>Bayar: Rp {{ number_format($transaksi->bayar) }}</p>
        <p class="text-green-600">
            Kembalian: Rp {{ number_format($transaksi->kembalian) }}
        </p>

    </div>

</x-layout.sidebar>