<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beneficiarios extends Model
{
    use SoftDeletes;
    protected $fillable = [

            'ap_paterno',
            'ap_materno',
            'fech_nac',
            'sexo',
            'est_civil',
            'escolaridad',
            'ine',
            'ing_mensual',
            'espa',
            'lengua',
            'at_medica',
            'discapacidad',
            'dep_economicos',
            'prog_social',
            'ocupacion',
            'localidad',
            'colonia',
            'calle_numero',
            'telefono',
            'direccion',
            'correo',

    ];


    public function representante()
    {
        return $this->belongsTo(Representante::class, 'id_representante');
    }

    public function coordinador()
    {
        return $this->belongsTo(Coordinador::class);
    }
}
