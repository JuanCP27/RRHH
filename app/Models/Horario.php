<?php

namespace App\Models;
use App\Models\Empleado;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use  HasFactory;
    protected $table = 'horarios';
    
    public function empleados()
    {
        return $this->belongsToMany(Empleado::class,'empleado_horario','horario_id','empleado_id');
    }

    // Resto de relaciones y métodos relevantes
}