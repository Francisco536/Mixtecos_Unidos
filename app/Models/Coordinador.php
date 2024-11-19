<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coordinador extends Model
{
    public function representantes()
    {
        return $this->hasMany(Representante::class);
    }

    public function beneficiarios()
    {
        return $this->hasMany(Beneficiarios::class);
    }
}
