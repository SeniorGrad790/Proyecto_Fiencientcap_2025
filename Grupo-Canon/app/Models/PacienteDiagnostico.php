<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PacienteDiagnostico extends Model
{
    protected $table = 'paciente_diagnostico'; // Nombre personalizado de la tabla
    protected $primaryKey = 'id'; // Clave primaria por defecto de Laravel

    protected $fillable = [
        'id_paciente',
        'id_enfermedad',
    ];

    // Relación con Paciente
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente', 'id_paciente');
    }

    // Relación con Enfermedad
    public function enfermedad()
    {
        return $this->belongsTo(Enfermedad::class, 'id_enfermedad', 'id_enfermedad');
    }
}
