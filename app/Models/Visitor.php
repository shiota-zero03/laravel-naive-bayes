<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $table = 'visitors';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ip_address',
        'user_agent',
        'visit_date'
    ];
}
