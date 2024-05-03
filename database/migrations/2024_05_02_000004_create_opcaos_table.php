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
        Schema::create('opc_opcao', function (Blueprint $table) {
            $table->id('opc_id');
            $table->string('opc_texto', 100)->nullable();
            $table->boolean('opc_resposta');
            $table->unsignedBigInteger('opc_que_id');

            $table->foreign('opc_que_id')->references('que_id')->on('que_questao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opc_opcao');
    }
};
