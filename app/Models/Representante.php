<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    public function coordinador()
    {
        return $this->belongsTo(Coordinador::class);
    }

    public function beneficiarios()
    {
        return $this->hasMany(Beneficiarios::class);
    }
}
