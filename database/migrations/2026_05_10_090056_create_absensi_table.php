<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();

            // Karyawan yang absen
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Usaha — untuk isolasi data per toko
            $table->foreignId('usaha_id')
                ->constrained('usaha')
                ->onDelete('cascade');

            $table->date('tanggal');

            // Check-in / Check-out
            $table->time('jam_masuk')->nullable();
            $table->time('jam_keluar')->nullable();

            // Status: hadir | izin | sakit | alpha
            $table->enum('status', ['hadir', 'izin', 'sakit', 'alpha'])->default('hadir');

            $table->text('catatan')->nullable();

            // Siapa yang mencatat (admin/pemilik)
            $table->foreignId('dicatat_oleh')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();

            // Satu user hanya bisa punya 1 absen per hari
            $table->unique(['user_id', 'tanggal']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
