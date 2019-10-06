<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartementFormationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departement_formation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('departement_id');
            $table->unsignedBigInteger('formation_id');
            $table->timestamps();

            $table->foreign('departement_id')->references('id')->on('departements')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('formation_id')->references('id')->on('formations')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departement_formation');
    }
}
