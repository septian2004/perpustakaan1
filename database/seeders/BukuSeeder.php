<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    public function run()
    {
        Buku::create([
            'judul' => 'Belajar Laravel',
            'penulis' => 'John Doe',
            'deskripsi' => 'Panduan dasar menggunakan Laravel.',
            'tahun_terbit' => 2023,
        ]);

        Buku::create([
            'judul' => 'PHP Modern',
            'penulis' => 'Jane Doe',
            'deskripsi' => 'Pemrograman PHP untuk pengembang modern.',
            'tahun_terbit' => 2022,
        ]);
    }
}
