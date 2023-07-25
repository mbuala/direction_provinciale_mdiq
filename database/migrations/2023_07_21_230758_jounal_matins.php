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
        Schema::create('jounal_matins', function (Blueprint $table) {
            $table->id();
            $table->integer('id_offer');
            $table->integer('id_avis');
            $table->integer('numero_journal');
            $table->date('Date');
            $table->integer('Page_num');
            $table->text('etat');

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
        Schema::dropIfExists('jounal_matins');

    }
};
