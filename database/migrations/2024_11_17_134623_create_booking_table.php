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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user_tamu');
            $table->unsignedBigInteger('id_people');
            $table->dateTime('tanggal_book');
            $table->dateTime('tanggal_checkin');
            $table->dateTime('tanggal_checkout');
            $table->unsignedBigInteger('id_kamar');
            $table->string('pembayaran', 100);
            $table->decimal('total_harga', 10, 2);
            $table->string('status', 100);
            $table->unsignedBigInteger('id_user_accept')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_user_tamu')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_people')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('id_kamar')->references('id')->on('kamar')->onDelete('cascade');
            $table->foreign('id_user_accept')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
