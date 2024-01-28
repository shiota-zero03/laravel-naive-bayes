<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProbabilitasLabel extends Model
{
    use HasFactory;
    protected $table = 'probabilitas_labels';
    protected $primaryKey = 'id';
    protected $fillable = ['label'];
}
