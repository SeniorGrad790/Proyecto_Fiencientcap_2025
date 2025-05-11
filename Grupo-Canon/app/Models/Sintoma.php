<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sintoma extends Model
{
    protected $primaryKey = 'id_sintoma';
    public $timestamps = false;

    protected $fillable = ['nombre'];

    public function diagnosticos()
    {
        return $this->hasMany(Diagnostico::class, 'id_sintoma');
    }

    public function enfermedades()
    {
        return $this->belongsToMany(Enfermedad::class, 'sintomas_enfermedades', 'id_sintoma', 'id_enfermedad');
    }
}