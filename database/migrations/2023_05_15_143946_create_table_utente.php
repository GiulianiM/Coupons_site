<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUtente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utente', function (Blueprint $table) {
            $table->bigIncrements('idUtente');
            $table->string('nome');
            $table->string('cognome');
            $table->tinyInteger('genere')->nullable();
            $table->integer('eta')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telefono',10)->nullable();
            $table->string('username',20)->unique();
            $table->string('password');
            $table->string('livello')->default('user');
            $table->rememberToken();
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
        Schema::dropIfExists('utente');
    }
};
