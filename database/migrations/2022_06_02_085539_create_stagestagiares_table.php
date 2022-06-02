<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStageStagiaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stage_stagiares', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stage_id');
            $table->foreign('stage_id')->references('id')->on('stages')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('stagiaires_id');
            $table->foreign('stagiaires_id')->references('id')->on('stagiaires')
            ->onDelete('cascade')
            ->onUpdate('cascade');

          
            
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
        Schema::dropIfExists('stage-_stagiares');
    }
}
