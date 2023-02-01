<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorarioInterpreteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario_interprete', function (Blueprint $table) {
            $table->unsignedBigInteger('horario_id');
            $table->foreign('horario_id')
            ->references('id')
            ->on('horarios')
            ->onDelete('cascade');
            $table->unsignedBigInteger('interprete_id');
            $table->foreign('interprete_id')
            ->references('id')
            ->on('interpretes')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horario_interprete');
    }
}
