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
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('ap_paterno')->nullable();
            $table->string('ap_materno')->nullable();
            $table->string('fech_nac')->nullable();
            $table->string('sexo')->nullable();
            $table->string('escolaridad')->nullable();
            $table->string('ine')->nullable();
            $table->string('ing_mensual')->nullable();
            $table->string('espa')->nullable();
            $table->string('lengua')->nullable();
            $table->string('at_medica')->nullable();
            $table->string('discapacidad')->nullable();
            $table->string('dep_economicos')->nullable();
            $table->string('prog_social')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('localidad')->nullable();
            $table->string('colonia')->nullable();
            $table->string('calle_numero')->nullable();
            $table->interger('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('correo')->nullable();
            $table->foreignId('id_coordinador')->nullable();
            $table->foreignId('id_representante')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiarios');
    }
};
