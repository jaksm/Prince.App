<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLetExportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('let_exports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_leta');
            $table->string('polazna_dest_icao');
            $table->string('dolazna_dest_icao');
            $table->dateTimeTz('vreme_poletanja');
            $table->dateTimeTz('vreme_sletanja');
            $table->string('kapetan')->nullable();
            $table->string('kopilot')->nullable();
            $table->string('stjuardesa')->nullable();
            $table->string('registracija_aviona');
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
        Schema::dropIfExists('let_exports');
    }
}
