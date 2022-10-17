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
        Schema::create('versiculos', function (Blueprint $table) {
            $table->id();
            $table->string('capitulo', 255);
            $table->string('versiculo', 255);
            $table->text('texto');
            $table->unsignedInteger('livro_id');
            $table->foreign('livro_id')->references('id')->on('livros');
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
        Schema::dropIfExists('versiculos');
    }
};
