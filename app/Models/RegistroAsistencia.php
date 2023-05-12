<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroAsistencia extends Model
{
    use  HasFactory;
    protected $primaryKey = 'id_registro';

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }

    // Resto de relaciones y métodos relevantes
}