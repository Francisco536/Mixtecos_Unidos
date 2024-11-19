<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiarios extends Model
{
    public function representante()
    {
        return $this->belongsTo(Representante::class);
    }

    public function coordinador()
    {
        return $this->belongsTo(Coordinador::class);
    }
}
