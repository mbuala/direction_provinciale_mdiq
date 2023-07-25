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
        Schema::create('concurrents', function (Blueprint $table) {
            $table->id();
            $table->integer('id_offer');
            $table->integer('id_avis');
            $table->text('Nom');
            $table->text('Postuler');
            $table->text('Dossier_complet');
            $table->text('existe');
            $table->text('eliminer');
            $table->text('Motif');
            $table->text('reserver');
            $table->text('objet_reserve');
            $table->text('Mantant_dactes');
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
        Schema::dropIfExists('concurrents');

    }
};
