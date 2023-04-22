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
        Schema::create('apresentacao_pagina_textos', function (Blueprint $table) {
            $table->id();
            $table->text('texto');
            $table->foreignId('apresentacao_pagina_id')->constrained('apresentacao_paginas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apresentacao_pagina_textos');
    }
};
