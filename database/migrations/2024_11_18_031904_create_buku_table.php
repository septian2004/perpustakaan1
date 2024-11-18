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
        Schema::create('buku', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('judul'); // Judul buku
            $table->string('pengarang'); // Nama pengarang
            $table->string('penerbit'); // Nama penerbit
            $table->year('tahun_terbit'); // Tahun terbit
            $table->integer('stok'); // Jumlah stok buku
            $table->timestamps(); // Kolom created_at dan updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
