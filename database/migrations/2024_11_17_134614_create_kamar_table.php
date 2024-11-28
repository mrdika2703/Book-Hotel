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
        Schema::create('kamar', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_kamar', 100);
            $table->tinyInteger('jumlah_kamar');
            $table->text('fasilitas'); // Bisa berupa JSON untuk menyimpan daftar fasilitas
            $table->text('deskripsi_kamar');
            $table->decimal('harga_kamar', 10, 2);
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamar');
    }
};
