<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Probability extends Model
{
    use HasFactory;
    protected $table = 'probabilities';
    protected $primaryKey = 'id';
    protected $fillable = [
        'label_id',
        'type',
        'cukup_puas',
        'puas',
        'tidak_puas',
    ];
}
