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
        return $this->belongsToMany(Horario::class,'empleado_horario','empleado_id','horario_id');
        //,'empleado_horario','empleado_id','horario_id'
    }
    

    // Relación con Registro_Asistencia
    public function registrosAsistencia()
    {
        return $this->belongsTo(RegistroAsistencia::class,'empleado_id');
    }

    // Relación con Permisos
    public function permisos()
    {
        return $this->hasMany(Permiso::class, 'empleado_id');
    }

    // Relación con Vacaciones
    public function vacaciones()
    {
        return $this->hasMany(Vacacion::class, 'empleado_id');
    }
}
