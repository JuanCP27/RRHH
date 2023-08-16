<?php

namespace Database\Factories;

use App\Models\Empleado;
use App\Models\RegistroAsistencia;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegistroAsistenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startDate = Carbon::parse('2023-01-01');
        $endDate = Carbon::parse('2023-12-31');
        $fecha = $this->faker->dateTimeBetween($startDate, $endDate)->format('Y-m-d');
    
        return [
            'empleado_id' => Empleado::inRandomOrder()->first()->id,
            'fecha' => $fecha,
            'hora_entrada' => $this->faker->time(),
            'hora_salida' => $this->faker->time(),
        ];
       
       
       
        //$startDate = '2023-01-01'; // Fecha de inicio del rango
        //$endDate = '2023-12-31';   // Fecha de fin del rango
        //return [
            //
          //  'empleado_id' => Empleado::inRandomOrder()->first()->id,
            //'fecha' => $this->faker->date($format = 'Y-m-d', $max = 'now'), // '1979-06-09'
           // 'hora_entrada' => $this->faker->time(),
            //'hora_salida' => $this->faker->time(),
            //$this->$faker->dateTime(),
            // Definición de la relación uno a muchos con Profile
        //];
    }
}
