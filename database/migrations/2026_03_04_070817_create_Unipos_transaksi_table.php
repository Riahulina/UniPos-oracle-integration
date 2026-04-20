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

            // 🔥 kasir (user login)
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // 🔥 pelanggan (boleh null = pembeli umum)
            $table->foreignId('pelanggan_id')
                ->nullable()
                ->constrained('pelanggan')
                ->nullOnDelete();

            // 🔹 keuangan
            $table->integer('total');
            $table->integer('bayar');
            $table->integer('kembalian');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};