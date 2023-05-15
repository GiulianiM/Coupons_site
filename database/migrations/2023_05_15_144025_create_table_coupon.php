<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCoupon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon', function (Blueprint $table) {
            $table->bigIncrements('idCoupon');
            $table->bigInteger('idUtente')->unsigned()->index();
            $table->bigInteger('idPromozione')->unsigned()->index();
            $table->foreign('idUtente')->references('idUtente')->on('utente');
            $table->foreign('idPromozione')->references('idPromozione')->on('promozione');
            $table->string('codice',6)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon');
    }
};
