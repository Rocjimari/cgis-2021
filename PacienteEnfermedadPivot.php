<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacienteEnfermedadPivot extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_revision','notas','estado'];
    protected $casts = [
        'fecha_revision' => 'datetime:Y-m-d',
    ];
}
