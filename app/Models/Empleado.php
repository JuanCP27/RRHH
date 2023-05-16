<?php

namespace App\Models;

use App\Models\Horario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Empleado extends Model
{
    use  HasFactory;
    protected $table = 'empleados';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'apellido', 'puesto', 'departamento'];

    // Relación con Horarios

    public function horarios()
    {
        return $this->belongsToMany(Horario::class, 'empleado_horario');
    }

    // Relación con Registro_Asistencia
    public function registrosAsistencia()
    {
        return $this->hasMany(RegistroAsistencia::class, 'id_emplado');
    }

    // Relación con Permisos
    public function permisos()
    {
        return $this->hasMany(Permiso::class, 'id_empleado');
    }

    // Relación con Vacaciones
    public function vacaciones()
    {
        return $this->hasMany(Vacacion::class, 'id_empleado');
    }
}
