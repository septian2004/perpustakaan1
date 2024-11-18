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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('id_peminjaman'); // Primary Key
            $table->unsignedBigInteger('id_buku'); // Kolom foreign key untuk buku
            $table->unsignedBigInteger('id_user'); // Kolom foreign key untuk anggota
            $table->date('tanggal_peminjaman'); // Tanggal peminjaman buku
            $table->date('tanggal_jatuh_tempo'); // Tanggal jatuh tempo pengembalian
            $table->timestamps(); // Kolom created_at dan updated_at
        
            // Menambahkan relasi foreign key
            $table->foreign('id_buku')->references('id')->on('buku')->onDelete('cascade');
            $table->foreign('id_anggota')->references('id')->on('anggota')->onDelete('cascade');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
