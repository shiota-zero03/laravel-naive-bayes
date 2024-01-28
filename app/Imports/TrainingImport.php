<?php

namespace App\Imports;

use App\Models\Dataset;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TrainingImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $total = 0;
        for($i = 5; $i < 20; $i++){
            $total += intval($row[$i]);
        }
        $avg = number_format(doubleval($total/15), 2, '.', '');

        if( $avg >= 3.5 ) $result = 'PUAS';
        elseif ($avg >= 3) $result = 'CUKUP PUAS';
        else $result = 'TIDAK PUAS';

        return new Dataset([
            'nama' => $row[2],
            'jenis_kelamin' => $row[2],
            'nim' => $row[3],
            'jurusan' => $row[4],
            'q1' => $row[5],
            'q2' => $row[6],
            'q3' => $row[7],
            'q4' => $row[8],
            'q5' => $row[9],
            'q6' => $row[10],
            'q7' => $row[11],
            'q8' => $row[12],
            'q9' => $row[13],
            'q10' => $row[14],
            'q11' => $row[15],
            'q12' => $row[16],
            'q13' => $row[17],
            'q14' => $row[18],
            'q15' => $row[19],
            'type' => 'training',
            'hasil' => $result,
            'rata_rata' => $avg,
            'random_number' => round(mt_rand(100, 999) / 100, 2),
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
