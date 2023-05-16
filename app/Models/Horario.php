<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use  HasFactory;
    protected $table = 'horarios';
    
    public function empleado()
    {
        return $this->belongsToMany(Empleado::class, 'empleado_horario');
    }

    // Resto de relaciones y métodos relevantes
}