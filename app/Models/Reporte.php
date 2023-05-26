<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use  HasFactory;
    protected $primaryKey = 'id';

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    // Resto de relaciones y métodos relevantes
}