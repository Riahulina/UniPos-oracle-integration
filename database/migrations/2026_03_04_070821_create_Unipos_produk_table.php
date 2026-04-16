<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();

            $table->foreignId('usaha_id')
                ->constrained('usaha')
                ->onDelete('cascade');

            // ✅ langsung FK ke kategori (FIX)
            $table->foreignId('kategori_id')
                ->constrained('kategori')
                ->onDelete('cascade');

            $table->string('kode_produk')->nullable();
            $table->string('barcode')->nullable()->unique();

            $table->string('nama_produk');

            $table->decimal('harga_beli', 12, 2)->default(0);
            $table->decimal('harga_jual', 12, 2);

            $table->integer('stok')->default(0);
            $table->integer('stok_minimal')->default(0);

            $table->string('satuan')->nullable();
            $table->string('gambar')->nullable();

            $table->boolean('is_jasa')->default(false);
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};