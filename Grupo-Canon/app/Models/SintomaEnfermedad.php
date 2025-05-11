<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SintomaEnfermedad extends Model
{
    protected $table = 'sintomas_enfermedades';
    public $timestamps = false;

    protected $fillable = ['id_sintoma', 'id_enfermedad'];

    public function sintoma()
    {
        return $this->belongsTo(Sintoma::class, 'id_sintoma');
    }

    public function enfermedad()
    {
        return $this->belongsTo(Enfermedad::class, 'id_enfermedad');
    }
}