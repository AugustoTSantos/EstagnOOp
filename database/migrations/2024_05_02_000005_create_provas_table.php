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
        Schema::create('pro_prova', function (Blueprint $table) {
            $table->id('pro_id');
            $table->string('pro_nome')->nullable();
            $table->float('pro_nota', 2, 2)->nullable();
            $table->unsignedBigInteger('pro_usu_id');

            $table->foreign('pro_usu_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pro_prova');
    }
};
