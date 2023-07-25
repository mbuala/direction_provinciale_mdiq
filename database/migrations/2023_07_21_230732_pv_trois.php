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
        Schema::create('pv_trois', function (Blueprint $table) {
            $table->id();
            $table->integer('num_offer');
            $table->integer('id_avis');
            $table->integer('id_gagnant');
            $table->integer('id_pv_deux');
            $table->text('Nom_gerant');
            $table->text('qualiter');
            $table->text('Num_cnss');
            $table->text('capital_social');
            $table->text('adresse');
            $table->text('registre');
            $table->text('RIB');
            $table->text('banque');
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
        Schema::dropIfExists('pv_trois');

    }
};
