<?php

namespace App\Exports;

use App\Models\Dataset;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrainingExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            "Nama",
            "Jenis Kelamin",
            "NIM",
            "Jurusan",
            "Kecepatan petugas dalam melayani mahasiswa",
            "Respon petugas ketika menerima kritik dan saran",
            "Komunikasi petugas yang baik dengan mahasiswa",
            "Kemampuan petugas dalam melayani peminjaman dan pengembelian buku",
            "Petugas berpakaian rapih dan sopan",
            "Perkembangan teknologi yang digunakan perpustakaan Unsurya",
            "Kualitas sarana dan prasarana yang ada diperpustakaan Unsurya",
            "Tingkat kenyamanan dalam ruang perpustakaan Unsurya",
            "Penyediaan buku terbaru yang ada diperpustakaan Unsurya",
            "Kondisi dan kelayakan fisik buku yang ada diperpustakaan Unsurya",
            "Sarana pembelajaran yang tersedia diruang perpus Unsurya",
            "Ketanggapan petugas dalam melayani mahasiswa",
            "Kesopanan petugas dalam melayani",
            "Petugas perpustakaan bersikap adil kesemua mahasiswa",
            "Kondisi ruang perpustakaan yang bersih dan buku tertata rapih dirak",
            "Hasil",
            "Rata - Rata"
        ];
    }
    public function collection()
    {
        return Dataset::where('type', 'training')->get([
            'nama', 'jenis_kelamin', 'nim', 'jurusan', 'q1', 'q2', 'q3', 'q4', 'q5', 'q6', 'q7', 'q8', 'q9', 'q10', 'q11', 'q12', 'q13', 'q14', 'q15', 'hasil', 'rata_rata'
        ]);
    }
}
