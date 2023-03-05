<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','sexo','edad',
    'estado_salud_incial','fecha_entrada','hora_entrada',
    'fecha_salidad','hora_salida','estado'];
    protected $casts = [
        'edad' => 'integer',
        'fecha_entrada' => 'datetime:Y-m-d',
        'hora_entrada' => 'datetime:H:i:s',
        'fecha_salida' => 'datetime:Y-m-d',
        'hora_salida' => 'datetime:H:i:s',
    ]

    //relacion 1:1 Paciente-->Camas
    public function cama(){
        return $this->hasOne(Cama::class);
    }
    // relacion 1:N Paciente--> Enfermedad
    public function enfermedades(){
        return $this->hasMany(Enfermedad::class);
    }
    // relacion N:N Paciente-->Enfermero
    public function enfermeros(){
        return $this->belongsToMany(Enfermero::class)->withPivot('fecha_revision','notas','estado');
    }



    public function citas(){
        return $this->hasMany(Cita::class);
    }

    public function medicos(){
        return $this->hasManyThrough(Medico::class, Cita::class);
    }

    public function getMedicamentosActualesAttribute(){
        $medicamentos_actuales = collect([]);
        foreach ($this->citas as $cita) {
            $medicamentos_actuales->merge($cita->medicamentos()->wherePivot('inicio','<=', Carbon::now())->wherePivot('fin','>=', Carbon::now())->get());
            /* Alternativa
            if($cita->medicamentos()->wherePivot('inicio','<=', Carbon::now())->wherePivot('fin','>=', Carbon::now())->exists()){
                $medicamentos_actuales->merge($cita->medicamentos()->wherePivot('inicio','<=', Carbon::now())->wherePivot('fin','>=', Carbon::now())->get());
            }
            */
        }
        return $medicamentos_actuales;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
