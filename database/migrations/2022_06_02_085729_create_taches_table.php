<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stagiare_id');
            $table->foreign('stagiare_id')->references('id')->on('stagiaires')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('encadreur_id');
            $table->foreign('encadreur_id')->references('id')->on('encadreurs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->text('nom_tache');
            $table->date('date_debut_tache');
            $table->date('date_fin_tache');
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
        Schema::dropIfExists('taches');
    }
}
