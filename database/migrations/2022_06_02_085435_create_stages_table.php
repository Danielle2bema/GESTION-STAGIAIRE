<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('stagiare_id');
            $table->foreign('stagiare_id')->references('id')->on('stagiaires')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('encadreur_id');
            $table->foreign('encadreur_id')->references('id')->on('encadreurs')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('domaine_id');
            $table->foreign('domaine_id')->references('id')->on('domaines')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->text('theme');
            $table->date('date_debut_stage');
            $table->date('date_fin_stage');
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
        Schema::dropIfExists('stages');
    }
}
