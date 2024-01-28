<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProbabilityLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "id" => 1,
                "label" => 'Jenis Kelamin'
            ],
            [
                "id" => 2,
                "label" => "Jurusan"
            ],
            [
                "id" => 3,
                "label" => "Kecepatan petugas dalam melayani mahasiswa"
            ],
            [
                "id" => 4,
                "label" => "Respon petugas ketika menerima kritik dan saran"
            ],
            [
                "id" => 5,
                "label" => "Komunikasi petugas yang baik dengan mahasiswa"
            ],
            [
                "id" => 6,
                "label" => "Kemampuan petugas dalam melayani peminjaman dan pengembelian buku"
            ],
            [
                "id" => 7,
                "label" => "Petugas berpakaian rapih dan sopan"
            ],
            [
                "id" => 8,
                "label" => "Perkembangan teknologi yang digunakan perpustakaan Unsurya"
            ],
            [
                "id" => 9,
                "label" => "Kualitas sarana dan prasarana yang ada diperpustakaan Unsurya"
            ],
            [
                "id" => 10,
                "label" => "Tingkat kenyamanan dalam ruang perpustakaan Unsurya"
            ],
            [
                "id" => 11,
                "label" => "Penyediaan buku terbaru yang ada diperpustakaan Unsurya"
            ],
            [
                "id" => 12,
                "label" => "Kondisi dan kelayakan fisik buku yang ada diperpustakaan Unsurya"
            ],
            [
                "id" => 13,
                "label" => "Sarana pembelajaran yang tersedia diruang perpus Unsurya"
            ],
            [
                "id" => 14,
                "label" => "Ketanggapan petugas dalam melayani mahasiswa"
            ],
            [
                "id" => 15,
                "label" => "Kesopanan petugas dalam melayani"
            ],
            [
                "id" => 16,
                "label" => "Petugas perpustakaan bersikap adil kesemua mahasiswa"
            ],
            [
                "id" => 17,
                "label" => "Kondisi ruang perpustakaan yang bersih dan buku tertata rapih dirak"
            ]
        ];
        \App\Models\ProbabilitasLabel::insert($data);
    }
}
