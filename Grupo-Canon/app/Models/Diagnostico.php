<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $primaryKey = 'id_diagnostico';
    public $timestamps = false;

    protected $fillable = ['id_paciente', 'id_sintoma'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function sintoma()
    {
        return $this->belongsTo(Sintoma::class, 'id_sintoma');
    }
}