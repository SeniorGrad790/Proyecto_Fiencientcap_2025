<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $primaryKey = 'id_paciente';
    public $timestamps = false;

    protected $fillable = ['nombre', 'apellido', 'edad', 'sexo', 'barrio', 'ciudad', 'nro_documento'];

    public function diagnosticos()
    {
        return $this->hasMany(Diagnostico::class, 'id_paciente');
    }
}