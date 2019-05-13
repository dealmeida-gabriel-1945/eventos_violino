<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoMusicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_musica', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('especificacao');

            $table->unsignedBigInteger('musica_id')->nullable();
            $table->foreign('musica_id')->references('id')->on('musica');

            $table->unsignedBigInteger('evento_id');
            $table->foreign('evento_id')->references('id')->on('evento');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evento_musica');
    }
}
