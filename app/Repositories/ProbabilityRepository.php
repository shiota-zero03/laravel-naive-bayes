<?php

namespace App\Repositories;
use App\Models\Probability;

class ProbabilityRepository
{
    public function insertData($data)
    {
        return Probability::insert($data);
    }
    public function deleteAllData()
    {
        return Probability::truncate();
    }
    public function getAll()
    {
        return Probability::all();
    }
    public function getByTypeandLabel($label, $type)
    {
        return Probability::where('label_id', $label)
                            ->where('type', $type)
                            ->first();
    }
}