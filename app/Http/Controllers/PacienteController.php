<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function validar_pacientes_con_enfermedad($id){
        $paciente = Enfermedad::find($id)->pacientes;
        foreach($pacientes as $paciente){
            $paciente -> valido=true;
            $paciente-> save()
        }
    }
    //
}
