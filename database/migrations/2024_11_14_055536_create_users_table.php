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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50)->unique();
            $table->string('password', 150);
            $table->enum('role', ['tamu', 'resepsionis', 'admin']);
            $table->string('nama_lengkap', 100);
            $table->string('nama_panggilan', 25);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('email', 100)->unique();
            $table->string('no_telepon', 50);
            
            // Foreign keys to people table with unsignedBigInteger
            for ($i = 1; $i <= 10; $i++) {
                $table->unsignedBigInteger("add_people$i")->nullable();
                $table->foreign("add_people$i")->references('id')->on('people')->onDelete('set null');
            }

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
