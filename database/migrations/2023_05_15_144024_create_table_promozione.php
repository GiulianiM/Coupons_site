<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePromozione extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promozione', function (Blueprint $table) {
            $table->id('idPromozione');
            $table->bigInteger('idAzienda')->unsigned()->index();
            $table->foreign('idAzienda')->references('idAzienda')->on('azienda');
            $table->boolean('visibile')->default(true);
            $table->string('titolo');
            $table->string('descrizione', 1200);
            $table->string('immagine', 2048)->nullable();
            $table->string('modalita');
            $table->string('luogo');
            $table->date('inizio');
            $table->date('fine');
            $table->string('sconto');
            $table->string('valore_sconto');
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
        Schema::dropIfExists('promozione');
    }
};
