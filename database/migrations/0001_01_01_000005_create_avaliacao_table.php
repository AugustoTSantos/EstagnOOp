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
        Schema::create('ava_avaliacao', function (Blueprint $table) {
            $table->id('ava_id');
            $table->float('ava_nota', 2, 2);
            $table->unsignedBigInteger('ava_que_id');
            $table->unsignedBigInteger('ava_usu_id');

            $table->foreign('ava_que_id')->references('que_id')->on('que_questao');
            $table->foreign('ava_usu_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ava_avaliacao');
    }
};
