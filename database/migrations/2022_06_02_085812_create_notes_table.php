<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tache_id');
            $table->foreign('tache_id')->references('id')->on('taches')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('stagiare_id');
            $table->foreign('stagiare_id')->references('id')->on('stagiaires')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('encadreur_id');
            $table->foreign('encadreur_id')->references('id')->on('encadreurs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->unsignedBigInteger('stage_id');
            $table->foreign('stage_id')->references('id')->on('stages')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->integer('note_tache');
            $table->text('commentaire_tache');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
