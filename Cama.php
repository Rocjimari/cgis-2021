<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cama extends Model
{
    use HasFactory;
    protected $fillable = ['numero_cama','ubicacion'];
    protected $casts = [
        'numero_cama' => 'integer',
    ];
public function paciente(){
    return $this->belongsTo(Paciente::class);
}
}
