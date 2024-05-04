<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('que_questao', function (Blueprint $table) {
            $table->id('que_id');
            $table->string('que_titulo')->nullable();
            $table->string('que_enunciado', 1000)->nullable();
            $table->unsignedBigInteger('que_usu_id');

            $table->foreign('que_usu_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('que_questao');
    }
};
