<x-layout.sidebar>

<style>
    .wrap {
        font-family: 'DM Sans', sans-serif;
    }

    .title {
        font-size: 22px;
        font-weight: 700;
        color: #1E3A8A;
        margin-bottom: 16px;
    }

    /* FORM */
    .form-card {
        background: #fff;
        border: 1px solid #DBEAFE;
        padding: 14px;
        border-radius: 14px;
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }

    .input {
        flex: 1;
        padding: 10px 12px;
        border: 1px solid #CBD5E1;
        border-radius: 10px;
        outline: none;
    }

    .btn {
        padding: 10px 14px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 13px;
        cursor: pointer;
        border: none;
    }

    .btn-add {
        background: #2563EB;
        color: #fff;
    }

    .btn-add:hover {
        background: #1E40AF;
    }

    /* GRID */
    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 14px;
    }

    .card {
        background: #fff;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        padding: 14px;
        transition: .2s;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.05);
    }

    .name {
        font-weight: 700;
        color: #1E3A8A;
        margin-bottom: 10px;
    }

    .actions {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .link {
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
    }

    .edit {
        color: #2563EB;
    }

    .delete {
        color: #DC2626;
    }

    .empty {
        text-align: center;
        color: #94A3B8;
        padding: 20px;
    }
</style>

<div class="wrap">

    <div class="title">Data Kategori</div>

    {{-- FORM TAMBAH --}}
    <form action="{{ route('kategori.store') }}" method="POST" class="form-card">
        @csrf

        <input 
            type="text" 
            name="nama_kategori" 
            placeholder="Nama Kategori..."
            class="input"
            required
        >

        <input type="hidden" name="usaha_id" value="1">

        <button type="submit" class="btn btn-add">
            + Tambah
        </button>
    </form>

    {{-- GRID KATEGORI --}}
    <div class="grid">

        @forelse($kategori as $item)
        <div class="card">

            <div class="name">
                {{ $item->nama_kategori }}
            </div>

            <div class="actions">

                <a href="{{ route('kategori.edit', $item->id) }}" class="link edit">
                    ✏️ Edit
                </a>

                <form action="{{ route('kategori.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button onclick="return confirm('Yakin hapus?')" class="link delete">
                        🗑 Hapus
                    </button>
                </form>

            </div>

        </div>
        @empty
        <div class="empty">
            Data kategori belum ada
        </div>
        @endforelse

    </div>

</div>

</x-layout.sidebar>