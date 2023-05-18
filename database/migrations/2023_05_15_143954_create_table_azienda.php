<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAzienda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('azienda', function (Blueprint $table) {
            $table->bigIncrements('idAzienda');
            $table->bigInteger('idUtente')->unsigned()->index();
            $table->foreign('idUtente')->references('idUtente')->on('utente');
            $table->string('nome');
            $table->string('via');
            $table->string('citta');
            $table->integer('cap');
            $table->string('logo', 2048);
            $table->string('ragione_sociale');
            $table->string('descrizione', 1200);
            $table->string('tipologia');
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
        Schema::dropIfExists('azienda');
    }
};
