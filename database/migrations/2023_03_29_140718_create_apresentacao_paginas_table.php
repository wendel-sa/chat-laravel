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
        Schema::create('apresentacao_paginas', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->string('titulo')->nullable();
            $table->string('descricao')->nullable();
            $table->string('cor')->nullable();
            $table->string('imagem')->nullable();
            $table->foreignId('apresentacao_id')->constrained('apresentacaos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apresentacao_paginas');
    }
};
