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
            $table->id('idAzienda');
            $table->bigInteger('idUtente')->unsigned()->index();
            $table->foreign('idUtente')->references('idUtente')->on('utente');
            $table->boolean('visibile')->default(true);
            $table->string('nome');
            $table->string('via');
            $table->integer('numero_civico');
            $table->string('citta');
            $table->string('cap', 5);
            $table->string('logo', 2048)->nullable();
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
