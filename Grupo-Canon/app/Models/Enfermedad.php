<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    protected $table = 'enfermedades';
    protected $primaryKey = 'id_enfermedad';
    public $timestamps = false;

    protected $fillable = ['nombre'];

    public function sintomas()
    {
        return $this->belongsToMany(Sintoma::class, 'sintomas_enfermedades', 'id_enfermedad', 'id_sintoma');
    }
}