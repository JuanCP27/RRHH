<?php

namespace Database\Factories;
use App\Models\RegistroAsistencia;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nombre' => $this->faker->name(),
            'apellido' => $this->faker->lastName(),
            'puesto' => $this->faker->streetSuffix(),
            'departamento' => $this->faker->streetSuffix(),
            //'registro_id' => RegistroAsistencia::factory(),
            
            //'registro_asistencias' => $this->faker->randomElements(
             //   RegistroAsistencia::pluck('empleado_id')->toArray(),
              //  $this->faker->numberBetween(1, 3) // Cantidad de perfiles a crear para el empleado
           // ),

            
        ];
    }
}
