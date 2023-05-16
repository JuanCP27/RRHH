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
            $table->integer('empleado_id')->unsigned();
            $table->integer('horario_id')->unsigned();
          

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
        Schema::dropIfExists('horarios');
        Schema::table('horario_personal', function (Blueprint $table) {
            
            $table->dropForeign(['id_horario']);
            $table->dropForeign(['id_empleado']);
           });
     
        Schema::dropIfExists('horario_personal');
        Schema::dropIfExists('horarios');
    }
}
