<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'buku';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'judul',
        'penulis',
        'deskripsi',
        'tahun_terbit',
    ];
}

