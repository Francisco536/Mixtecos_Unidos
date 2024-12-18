<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Representante extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'ap_paterno',
        'ap_materno',
        'sexo',
        'telefono',
        'direccion',
        'correo',
        'id_coordinador',

    ];
    public function coordinador()
    {
        return $this->belongsTo(Coordinador::class, 'id_coordinador'); // 'id_coordinador' es la clave foránea en la tabla representantes
    }

    public function beneficiarios()
    {
        return $this->hasMany(Beneficiarios::class, 'id_representante');
    }
}
