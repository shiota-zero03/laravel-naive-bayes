<?php

namespace App\Repositories;
use App\Models\Classification;

class KlasifikasiRepository
{
    public function insertData($data)
    {
        return Classification::insert($data);
    }
    public function deleteAllData()
    {
        return Classification::truncate();
    }
    public function getAll()
    {
        return Classification::all();
    }

    public function getByPredictionandFact($prediction, $fact)
    {
        return Classification::where('kelas_prediksi', $prediction)
                                ->where('kelas_asli', $fact)
                                ->get();
    }
}