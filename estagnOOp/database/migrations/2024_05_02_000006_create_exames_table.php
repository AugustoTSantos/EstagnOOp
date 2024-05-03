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
        Schema::create('exa_exame', function (Blueprint $table) {
            $table->id('exa_id');
            $table->unsignedBigInteger('exa_pro_id');
            $table->unsignedBigInteger('exa_que_id');

            $table->foreign('exa_pro_id')->references('pro_id')->on('pro_prova');
            $table->foreign('exa_que_id')->references('que_id')->on('que_questao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exa_exame');
    }
};
