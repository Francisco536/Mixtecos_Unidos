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
        Schema::create('representantes', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name')->nullable();
            $table->string('ap_paterno')->nullable();
            $table->string('ap_materno')->nullable();
            $table->string('sexo')->nullable();
            $table->integer('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('correo')->nullable();
            $table->foreignId('id_coordinador')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('representantes');
    }
};
