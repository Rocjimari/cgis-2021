<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = ['tipo','numero_camas', 'ubicacion'];
    protected $casts = [
        'numero_camas' => 'integer'
    ];
}
