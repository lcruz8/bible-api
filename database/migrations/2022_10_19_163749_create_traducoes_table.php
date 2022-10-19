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
        Schema::create('traducoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->string('abreviacao', 255);
            $table->unsignedInteger('idioma_id');
            $table->foreign('idioma_id')->references('id')->on('idiomas');
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
        Schema::dropIfExists('traducoes');
    }
};
