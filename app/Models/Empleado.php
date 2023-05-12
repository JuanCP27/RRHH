<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Empleado extends Model
{
    use  HasFactory;
    protected $primaryKey = 'id_empleado';

    public function user()
    {
        return $this->hasOne(User::class, 'id_empleado');
    }

    // Resto de relaciones y métodos relevantes
}
