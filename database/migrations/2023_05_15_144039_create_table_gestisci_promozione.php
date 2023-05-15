<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableGestisciPromozione extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestione_promozione', function (Blueprint $table) {
            $table->bigInteger('idUtente')->unsigned()->index();
            $table->bigInteger('idPromozione')->unsigned()->index();
            $table->foreign('idUtente')->references('idUtente')->on('utente');
            $table->foreign('idPromozione')->references('idPromozione')->on('promozione');               
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gestione_promozione');
    }
};
