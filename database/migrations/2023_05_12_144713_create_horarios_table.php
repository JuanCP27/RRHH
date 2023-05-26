<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dia_semana');
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->timestamps();
        });
        Schema::create('empleado_horario', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('horario_id');


            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('horario_id')->references('id')->on('horarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('empleado_horario', function (Blueprint $table) {
            $table->dropForeign(['empleado_id']);
            $table->dropForeign(['horario_id']);
        });

        Schema::dropIfExists('empleado_horario');
        Schema::dropIfExists('horarios');
    }
}
