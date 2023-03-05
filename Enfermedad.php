<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','tipo','clasificacion',
    'origen','frecuencia'];
    //Relacion 1:N Paciente-->Enfermedad
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
