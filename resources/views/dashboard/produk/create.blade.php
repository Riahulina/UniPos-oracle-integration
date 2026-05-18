<x-layout.sidebar>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap');

        .form-wrap * {
            box-sizing: border-box;
        }

        .form-wrap {
            font-family: 'DM Sans', system-ui, sans-serif;
            max-width: 860px;
        }

        /* ── HEADER ── */
        .form-header {
            margin-bottom: 26px;
        }

        .form-breadcrumb {
            font-size: 12px;
            color: #93A3B8;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .form-breadcrumb a {
            color: #3B82F6;
            text-decoration: none;
        }

        .form-breadcrumb a:hover {
            text-decoration: underline;
        }

        .form-title {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 24px;
            color: #1E3A8A;
            letter-spacing: -0.6px;
        }

        .form-title span {
            font-style: italic;
            color: #3B82F6;
        }

        /* ── CARD ── */
        .form-card {
            background: white;
            border-radius: 18px;
            border: 1px solid #DBEAFE;
            box-shadow: 0 2px 12px rgba(37, 99, 235, 0.07);
            overflow: hidden;
        }

        /* section header inside card */
        .section-head {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 18px 24px 14px;
            border-bottom: 1px solid #EFF6FF;
        }

        .section-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #3B82F6;
            flex-shrink: 0;
        }

        .section-label {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 15px;
            color: #1E3A8A;
        }

        .section-body {
            padding: 20px 24px;
        }

        /* ── FIELD ── */
        .field {
            margin-bottom: 16px;
        }

        .field:last-child {
            margin-bottom: 0;
        }

        .field-label {
            display: block;
            font-size: 12.5px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 6px;
            letter-spacing: .01em;
        }

        .field-label span {
            color: #DC2626;
            margin-left: 2px;
        }

        .field-inp,
        .field-select,
        .field-textarea {
            width: 100%;
            border: 1.5px solid #BFDBFE;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 13px;
            font-family: 'DM Sans', system-ui, sans-serif;
            color: #1E3A8A;
            background: white;
            outline: none;
            transition: border .15s, box-shadow .15s;
        }

        .field-inp:focus,
        .field-select:focus,
        .field-textarea:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .field-inp.error,
        .field-select.error {
            border-color: #FCA5A5;
        }

        .field-err {
            font-size: 11px;
            color: #DC2626;
            margin-top: 4px;
        }

        .field-hint {
            font-size: 11px;
            color: #93A3B8;
            margin-top: 4px;
        }

        .field-textarea {
            resize: vertical;
            min-height: 70px;
        }

        /* inline addon */
        .inp-group {
            display: flex;
            gap: 0;
        }

        .inp-group .field-inp {
            border-radius: 10px 0 0 10px;
            flex: 1;
            border-right: none;
        }

        .inp-addon {
            background: #EFF6FF;
            border: 1.5px solid #BFDBFE;
            border-left: none;
            border-radius: 0 10px 10px 0;
            padding: 0 14px;
            font-size: 12px;
            font-weight: 600;
            color: #3B82F6;
            display: flex;
            align-items: center;
            cursor: pointer;
            white-space: nowrap;
            transition: background .15s;
        }

        .inp-addon:hover {
            background: #DBEAFE;
        }

        /* 2-col grid */
        .field-grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .field-grid-3 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 14px;
        }

        /* ── GAMBAR UPLOAD ── */
        .img-upload-area {
            border: 2px dashed #BFDBFE;
            border-radius: 12px;
            padding: 24px;
            text-align: center;
            cursor: pointer;
            transition: all .15s;
            background: #F8FBFF;
            position: relative;
        }

        .img-upload-area:hover {
            border-color: #3B82F6;
            background: #EFF6FF;
        }

        .img-upload-area input[type=file] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        .img-preview {
            width: 100%;
            max-height: 160px;
            object-fit: contain;
            border-radius: 8px;
            margin-bottom: 8px;
            display: none;
        }

        .img-upload-icon {
            color: #BFDBFE;
            margin-bottom: 8px;
        }

        .img-upload-text {
            font-size: 12.5px;
            color: #93A3B8;
        }

        .img-upload-text strong {
            color: #3B82F6;
        }

        /* ── BARCODE PREVIEW ── */
        .barcode-preview-box {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px;
            background: #F8FBFF;
            border: 1.5px solid #BFDBFE;
            border-radius: 12px;
            margin-top: 8px;
        }

        #barcode-svg svg {
            display: block;
        }

        .barcode-info {
            font-size: 12px;
            color: #64748B;
        }

        .barcode-info strong {
            display: block;
            color: #1E3A8A;
            font-size: 13px;
            margin-bottom: 2px;
        }

        /* ── TOGGLE (is_jasa, status) ── */
        .toggle-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 16px;
            background: #F8FBFF;
            border: 1.5px solid #EFF6FF;
            border-radius: 10px;
        }

        .toggle-info {}

        .toggle-label {
            font-size: 13px;
            font-weight: 600;
            color: #1E3A8A;
        }

        .toggle-sub {
            font-size: 11px;
            color: #93A3B8;
            margin-top: 2px;
        }

        .toggle-switch {
            position: relative;
            width: 42px;
            height: 24px;
            flex-shrink: 0;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            inset: 0;
            background: #DBEAFE;
            border-radius: 99px;
            cursor: pointer;
            transition: background .2s;
        }

        .toggle-slider::before {
            content: '';
            position: absolute;
            width: 18px;
            height: 18px;
            background: white;
            border-radius: 50%;
            top: 3px;
            left: 3px;
            transition: transform .2s;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
        }

        .toggle-switch input:checked+.toggle-slider {
            background: #1D4ED8;
        }

        .toggle-switch input:checked+.toggle-slider::before {
            transform: translateX(18px);
        }

        /* ── FOOTER ACTIONS ── */
        .form-footer {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
            padding: 18px 24px;
            border-top: 1px solid #EFF6FF;
            background: #FAFCFF;
        }

        .btn-cancel {
            padding: 10px 20px;
            border: 1.5px solid #BFDBFE;
            border-radius: 10px;
            background: white;
            color: #64748B;
            font-size: 13px;
            font-weight: 600;
            font-family: 'DM Sans', system-ui, sans-serif;
            cursor: pointer;
            text-decoration: none;
            transition: all .15s;
        }

        .btn-cancel:hover {
            background: #EFF6FF;
            color: #1D4ED8;
        }

        .btn-save {
            padding: 10px 24px;
            border: none;
            border-radius: 10px;
            background: #1D4ED8;
            color: white;
            font-size: 13px;
            font-weight: 600;
            font-family: 'DM Sans', system-ui, sans-serif;
            cursor: pointer;
            transition: all .15s;
        }

        .btn-save:hover {
            background: #1E40AF;
            transform: translateY(-1px);
        }

        /* divider between sections */
        .form-divider {
            height: 1px;
            background: #EFF6FF;
        }

        @media (max-width: 600px) {

            .field-grid-2,
            .field-grid-3 {
                grid-template-columns: 1fr;
            }

            .section-body {
                padding: 16px;
            }
        }
    </style>

    <div class="form-wrap">

        {{-- HEADER --}}
        <div class="form-header">
            <div class="form-breadcrumb">
                <a href="{{ route('produk.index') }}">Produk</a>
                <span>›</span>
                <span>{{ isset($produk) ? 'Edit Produk' : 'Tambah Produk' }}</span>
            </div>
            <div class="form-title">
                {{ isset($produk) ? 'Edit' : 'Tambah' }} <span>Produk</span>
            </div>
        </div>

        {{-- FORM --}}
        <form
            action="{{ isset($produk) ? route('produk.update', $produk->id) : route('produk.store') }}"
            method="POST"
            enctype="multipart/form-data"
            id="produk-form">
            @csrf
            @if(isset($produk)) @method('PUT') @endif

            <div class="form-card">

                {{-- ── SEKSI 1: INFO DASAR ── --}}
                <div class="section-head">
                    <div class="section-dot"></div>
                    <div class="section-label">Informasi Dasar</div>
                </div>
                <div class="section-body">

                    <div class="field">
                        <label class="field-label">Nama Produk <span>*</span></label>
                        <input
                            class="field-inp {{ $errors->has('nama_produk') ? 'error' : '' }}"
                            type="text"
                            name="nama_produk"
                            value="{{ old('nama_produk', $produk->nama_produk ?? '') }}"
                            placeholder="Contoh: Kopi Susu Aren 500ml"
                            required
                            oninput="suggestKode(this.value)">
                        @error('nama_produk') <div class="field-err">{{ $message }}</div> @enderror
                    </div>

                    <div class="field">
                        <label class="field-label">Kategori <span>*</span></label>
                        <select
                            class="field-select {{ $errors->has('kategori_id') ? 'error' : '' }}"
                            name="kategori_id"
                            required>
                            <option value="">— Pilih Kategori —</option>
                            @foreach($kategori as $k)
                            <option value="{{ $k->id }}" {{ old('kategori_id', $produk->kategori_id ?? '') == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kategori }}
                            </option>
                            @endforeach
                        </select>
                        @error('kategori_id') <div class="field-err">{{ $message }}</div> @enderror
                    </div>

                    <div class="field-grid-2">
                        <div class="field">
                            <label class="field-label">Kode Produk</label>
                            <input
                                class="field-inp"
                                type="text"
                                name="kode_produk"
                                id="kode-produk"
                                value="{{ old('kode_produk', $produk->kode_produk ?? '') }}"
                                placeholder="Auto-generate dari nama"
                                oninput="renderBarcode(this.value || document.getElementById('barcode').value)">
                            <div class="field-hint">Bisa diisi manual atau otomatis dari nama produk</div>
                        </div>
                        <div class="field">
                            <label class="field-label">Barcode</label>
                            <div class="inp-group">
                                <input
                                    class="field-inp"
                                    type="text"
                                    name="barcode"
                                    id="barcode"
                                    value="{{ old('barcode', $produk->barcode ?? '') }}"
                                    placeholder="Kosongkan = auto generate"
                                    oninput="renderBarcode(this.value)">
                                <div class="inp-addon" onclick="generateBarcode()" title="Generate otomatis">⟳ Generate</div>
                            </div>
                            @error('barcode') <div class="field-err">{{ $message }}</div> @enderror
                            <div class="field-hint">Unik per produk · dipakai untuk scan di transaksi</div>
                        </div>
                    </div>

                    {{-- Barcode preview --}}
                    <div class="barcode-preview-box" id="barcode-preview-box" style="{{ (old('barcode', $produk->barcode ?? '')) ? '' : 'display:none;' }}">
                        <div id="barcode-svg"></div>
                        <div class="barcode-info">
                            <strong id="barcode-text-display">{{ old('barcode', $produk->barcode ?? '') }}</strong>
                            Preview barcode · ditempel di produk fisik
                        </div>
                    </div>

                    <div class="field" style="margin-top:16px;">
                        <label class="field-label">Satuan</label>
                        <input
                            class="field-inp"
                            type="text"
                            name="satuan"
                            value="{{ old('satuan', $produk->satuan ?? '') }}"
                            placeholder="pcs, kg, lusin, botol, …">
                    </div>

                </div>

                <div class="form-divider"></div>

                {{-- ── SEKSI 2: HARGA & STOK ── --}}
                <div class="section-head">
                    <div class="section-dot" style="background:#6366F1;"></div>
                    <div class="section-label">Harga & Stok</div>
                </div>
                <div class="section-body">

                    <div class="field-grid-2">
                        <div class="field">
                            <label class="field-label">Harga Beli</label>
                            <input
                                class="field-inp"
                                type="number"
                                name="harga_beli"
                                value="{{ old('harga_beli', $produk->harga_beli ?? 0) }}"
                                placeholder="0"
                                min="0"
                                oninput="calcMargin()">
                        </div>
                        <div class="field">
                            <label class="field-label">Harga Jual <span>*</span></label>
                            <input
                                class="field-inp {{ $errors->has('harga_jual') ? 'error' : '' }}"
                                type="number"
                                name="harga_jual"
                                id="harga-jual"
                                value="{{ old('harga_jual', $produk->harga_jual ?? '') }}"
                                placeholder="0"
                                min="0"
                                required
                                oninput="calcMargin()">
                            @error('harga_jual') <div class="field-err">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    {{-- Margin info --}}
                    <div id="margin-info" style="font-size:12px; color:#059669; margin-bottom:14px; display:none;">
                        Margin: <strong id="margin-val"></strong>
                    </div>

                    <div class="field-grid-2">
                        <div class="field">
                            <label class="field-label">Stok Awal</label>
                            <input
                                class="field-inp"
                                type="number"
                                name="stok"
                                value="{{ old('stok', $produk->stok ?? 0) }}"
                                placeholder="0"
                                min="0"
                                id="stok-field">
                        </div>
                        <div class="field">
                            <label class="field-label">Stok Minimal</label>
                            <input
                                class="field-inp"
                                type="number"
                                name="stok_minimal"
                                value="{{ old('stok_minimal', $produk->stok_minimal ?? 0) }}"
                                placeholder="0"
                                min="0">
                            <div class="field-hint">Notifikasi stok menipis di bawah angka ini</div>
                        </div>
                    </div>

                </div>

                <div class="form-divider"></div>

                {{-- ── SEKSI 3: GAMBAR ── --}}
                <div class="section-head">
                    <div class="section-dot" style="background:#0EA5E9;"></div>
                    <div class="section-label">Gambar Produk</div>
                </div>
                <div class="section-body">
                    <div class="img-upload-area" id="img-drop-area">
                        <input type="file" name="gambar" id="img-input" accept="image/*" onchange="previewImg(event)">
                        <img class="img-preview" id="img-preview"
                            src="{{ isset($produk) && $produk->gambar ? asset('storage/'.$produk->gambar) : '' }}"
                            style="{{ isset($produk) && $produk->gambar ? 'display:block;' : '' }}">
                        <div class="img-upload-icon" id="img-placeholder" style="{{ isset($produk) && $produk->gambar ? 'display:none;' : '' }}">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" stroke="#BFDBFE" stroke-width="1.5">
                                <rect x="4" y="4" width="28" height="28" rx="4" />
                                <circle cx="14" cy="14" r="3" />
                                <path d="M4 24l9-9 6 6 5-5 8 8" />
                            </svg>
                            <div class="img-upload-text">
                                <strong>Klik untuk upload</strong> atau drag & drop<br>
                                PNG, JPG, WebP · Maks 2MB
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-divider"></div>

                {{-- ── SEKSI 4: OPSI ── --}}
                <div class="section-head">
                    <div class="section-dot" style="background:#F59E0B;"></div>
                    <div class="section-label">Opsi Produk</div>
                </div>
                <div class="section-body" style="display:flex; flex-direction:column; gap:10px;">

                    <div class="toggle-row">
                        <div class="toggle-info">
                            <div class="toggle-label">Produk Jasa</div>
                            <div class="toggle-sub">Aktifkan jika ini produk jasa (tidak punya stok fisik)</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" name="is_jasa" value="1" id="is-jasa"
                                {{ old('is_jasa', $produk->is_jasa ?? false) ? 'checked' : '' }}
                                onchange="toggleJasa(this.checked)">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="toggle-row">
                        <div class="toggle-info">
                            <div class="toggle-label">Status Aktif</div>
                            <div class="toggle-sub">Produk nonaktif tidak muncul di halaman transaksi</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" name="status_aktif" value="1" id="status-aktif"
                                {{ old('status', $produk->status ?? 'aktif') === 'aktif' ? 'checked' : '' }}>
                            <span class="toggle-slider"></span>
                        </label>
                        {{-- hidden field untuk status enum --}}
                        <input type="hidden" name="status" id="status-hidden"
                            value="{{ old('status', $produk->status ?? 'aktif') }}">
                    </div>

                </div>

                {{-- ── FOOTER ── --}}
                <div class="form-footer">
                    <a href="{{ route('produk.index') }}" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-save">
                        {{ isset($produk) ? 'Simpan Perubahan' : 'Tambah Produk' }}
                    </button>
                </div>

            </div>
        </form>
    </div>

    {{-- JsBarcode CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>

    <script>
        // ── IMAGE PREVIEW ──
        function previewImg(e) {
            const file = e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = ev => {
                document.getElementById('img-preview').src = ev.target.result;
                document.getElementById('img-preview').style.display = 'block';
                document.getElementById('img-placeholder').style.display = 'none';
            };
            reader.readAsDataURL(file);
        }

        // ── KODE PRODUK SUGGEST ──
        function suggestKode(nama) {
            const kodeEl = document.getElementById('kode-produk');
            if (!kodeEl.value || kodeEl.dataset.auto === 'true') {
                const kode = 'PRD-' + nama.toUpperCase().replace(/[^A-Z0-9]/g, '').substring(0, 6);
                kodeEl.value = kode;
                kodeEl.dataset.auto = 'true';
            }
        }

        document.getElementById('kode-produk').addEventListener('input', function() {
            this.dataset.auto = 'false';
        });

        // ── BARCODE GENERATE & RENDER ──
        function generateBarcode() {
            const code = 'BC' + Date.now().toString().slice(-10);
            document.getElementById('barcode').value = code;
            renderBarcode(code);
        }

        function renderBarcode(code) {
            if (!code || code.length < 3) {
                document.getElementById('barcode-preview-box').style.display = 'none';
                return;
            }

            const container = document.getElementById('barcode-svg');
            container.innerHTML = '';

            new QRCode(container, {
                text: code,
                width: 100,
                height: 100
            });

            document.getElementById('barcode-text-display').textContent = code;
            document.getElementById('barcode-preview-box').style.display = 'flex';
        }

        // Init render jika ada barcode existing
        const existingBarcode = document.getElementById('barcode').value;
        if (existingBarcode) renderBarcode(existingBarcode);

        // ── MARGIN CALC ──
        function calcMargin() {
            const beli = parseFloat(document.querySelector('[name=harga_beli]').value) || 0;
            const jual = parseFloat(document.getElementById('harga-jual').value) || 0;
            const infoEl = document.getElementById('margin-info');
            const valEl = document.getElementById('margin-val');

            if (jual > 0 && beli > 0) {
                const margin = ((jual - beli) / beli * 100).toFixed(1);
                const rp = (jual - beli).toLocaleString('id-ID');
                valEl.textContent = `Rp ${rp} (${margin}%)`;
                infoEl.style.display = 'block';
                infoEl.style.color = jual >= beli ? '#059669' : '#DC2626';
            } else {
                infoEl.style.display = 'none';
            }
        }

        // ── TOGGLE JASA ──
        function toggleJasa(isJasa) {
            const stokField = document.getElementById('stok-field');
            stokField.closest('.field').style.opacity = isJasa ? '.4' : '1';
            stokField.disabled = isJasa;
        }

        // ── STATUS HIDDEN SYNC ──
        document.getElementById('status-aktif').addEventListener('change', function() {
            document.getElementById('status-hidden').value = this.checked ? 'aktif' : 'nonaktif';
        });

        // Init
        toggleJasa(document.getElementById('is-jasa').checked);
        calcMargin();
    </script>

</x-layout.sidebar>