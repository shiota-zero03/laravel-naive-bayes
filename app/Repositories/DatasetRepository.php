<?php

namespace App\Repositories;
use App\Models\Dataset;

class DatasetRepository
{
    public function getById($id)
    {
        return Dataset::find($id);
    }
    public function getByType($type)
    {
        return Dataset::where('type', $type)
                        ->get();
    }
    public function deleteAllData($type)
    {
        return Dataset::where('type', $type)->delete();
    }

    public function getByCategory($type, $label, $category, $result)
    {
        if($label == 0 && $category == 0){
            return Dataset::where('hasil', $result)
                        ->where('type', $type)
                        ->get();
        } else {
            return Dataset::where(''.$label.'', $category)
                            ->where('hasil', $result)
                            ->where('type', $type)
                            ->get();
        }
    }

    public function forDashboardByJurusan($label, $jurusan, $type, $result)
    {
        if($label == 'jenis_kelamin') {
            return Dataset::where('jenis_kelamin', $result)
                            ->where('jurusan', $jurusan)
                            ->where('type', $type)
                            ->get();
        } elseif($label == 'result') {
            return Dataset::where('hasil', $result)
                            ->where('jurusan', $jurusan)
                            ->where('type', $type)
                            ->get();
        }
    }
}