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
        Schema::create('sintomas_enfermedades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sintoma');
            $table->unsignedBigInteger('id_enfermedad');
            //$table->foreignId('id_sintoma')->constrained('sintomas')->onDelete('cascade');
            //$table->foreignId('id_enfermedad')->constrained('enfermedades')->onDelete('cascade');
            $table->foreign('id_sintoma')->references('id_sintoma')->on('sintomas')->onDelete('cascade');
            $table->foreign('id_enfermedad')->references('id_enfermedad')->on('enfermedades')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sintomas_enfermedades');
    }
};
