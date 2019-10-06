<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours_document', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cours_id');
            $table->unsignedBigInteger('document_id');
            $table->timestamps();

            $table->foreign('cours_id')->references('id')->on('cours')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('document_id')->references('id')->on('documents')
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
        Schema::dropIfExists('cours_document');
    }
}
