<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::create('pelanggan', function (Blueprint $table) {
        $table->id();

        $table->foreignId('usaha_id')
              ->nullable()
              ->constrained('usaha')
              ->nullOnDelete();

        $table->string('nama');
        $table->string('telepon')->nullable();
        $table->string('email')->nullable();
        $table->text('alamat')->nullable();

        $table->timestamps();
    });
}
};