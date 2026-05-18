<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();

            // 🔹 usaha
            $table->foreignId('usaha_id')
                ->constrained('usaha')
                ->cascadeOnDelete();

            // 🔹 kasir
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // 🔹 pelanggan
            $table->string('nama_pelanggan')->nullable();

            // 🔹 keuangan
            $table->integer('total');
            $table->integer('bayar')->default(0);       // default biar aman
            $table->integer('kembalian')->default(0);   // default biar aman

            // 🔥 PENTING: STATUS
            $table->enum('status', ['pending', 'lunas'])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};