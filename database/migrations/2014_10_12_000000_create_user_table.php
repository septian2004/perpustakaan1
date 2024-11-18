<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_members_table.php
public function up()
{
    Schema::create('user', function (Blueprint $table) {
        $table->id('id_user'); // Primary Key
        $table->string('nama'); // Nama anggota
        $table->string('email')->unique(); // Email anggota
        $table->string('telepon', 15); // Nomor telepon anggota
        $table->text('alamat'); // Alamat anggota
        $table->timestamps(); // Kolom created_at dan updated_at
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
