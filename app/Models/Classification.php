<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    use HasFactory;
    protected $table = 'classifications';
    protected $primaryKey = 'id';
    protected $fillable = [
        'testing_id',
        'cukup_puas',
        'puas',
        'tidak_puas',
        'kelas_prediksi',
        'kelas_asli',
    ];
}
