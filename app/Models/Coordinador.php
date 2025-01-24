<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coordinador extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'ap_paterno',
        'ap_materno',
        'telefono',
        'correo',

    ];
    public function representantes()
    {
        return $this->hasMany(Representante::class, 'id_coordinador');
    }

    public function beneficiarios()
    {
        return $this->hasMany(Beneficiarios::class, 'id_coordinador');
    }
}
