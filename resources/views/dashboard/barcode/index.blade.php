<x-layout.sidebar>
    <div class="p-6">

        {{-- HEADER --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">📦 Daftar Barcode Produk</h2>

            <button onclick="downloadPDF()" 
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                ⬇️ Download PDF
            </button>
        </div>

        {{-- AREA PRINT / PDF --}}
        <div id="print-area" class="grid grid-cols-2 md:grid-cols-4 gap-4">

            @foreach ($produk as $p)
                <div class="bg-white rounded-xl shadow p-6 text-center border">

                    <p class="font-semibold text-sm mb-2 truncate">
                        {{ $p->nama_produk }}
                    </p>

                    <div class="overflow-hidden">
                        <svg id="barcode-{{ $p->id }}"></svg>
                    </div>

                    <p class="text-xs text-gray-500 mt-2">
                        {{ $p->barcode }}
                    </p>

                    <button 
                        onclick="copyBarcode('{{ $p->barcode }}')" 
                        class="mt-2 text-xs bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded"
                    >
                        Copy
                    </button>

                </div>
            @endforeach

        </div>
    </div>

    {{-- JS BARCODE --}}
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>

    {{-- HTML2PDF --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            @foreach ($produk as $p)
                JsBarcode("#barcode-{{ $p->id }}", "{{ $p->barcode }}", {
                    format: "CODE128",
                    width: 1.5,
                    height: 50,
                    displayValue: false,
                    margin: 0
                });
            @endforeach
        });

        function copyBarcode(code) {
            navigator.clipboard.writeText(code);
            alert('Barcode disalin: ' + code);
        }

        function downloadPDF() {
            const element = document.getElementById('print-area');

            const opt = {
                margin: 5,
                filename: 'barcode-produk.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };

            html2pdf().set(opt).from(element).save();
        }
    </script>
</x-layout.sidebar>