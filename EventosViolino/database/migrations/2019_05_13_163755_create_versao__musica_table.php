<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVersaoMusicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('versao_musica', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sub_nome',75)->nullable();
            $table->string('artista',50);
            $table->string('tom',3);
            $table->text('observacao',250)->nullable();
            $table->string('nome_arquivo');

            $table->unsignedBigInteger('musica_id');
            $table->foreign('musica_id')->references('id')->on('musica');

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
        Schema::dropIfExists('versao_musica');
    }
}
