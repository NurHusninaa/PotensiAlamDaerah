<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('potensi_alam', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_daerah');
            $table->foreignId('id_kategori');
            $table->string('nama_potensi');
            $table->text('deskripsi')->nullable();
            $table->double('nilai_ekonomi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potensi_alam');
    }
};
