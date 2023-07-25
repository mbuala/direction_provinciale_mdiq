<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pv_deuxes', function (Blueprint $table) {
            $table->id();
            $table->integer('num_offer');
            $table->integer('id_pv_one');
            $table->integer('id_avis');
            $table->integer('id_concurrent');
            $table->integer('Mantant_dactes_apres_verification');
            $table->integer('Taux');
            $table->text('observe');


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
        Schema::dropIfExists('pv_deuxes');

    }
};
