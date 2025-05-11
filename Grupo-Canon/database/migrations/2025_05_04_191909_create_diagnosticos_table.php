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
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->id('id_diagnostico');
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_sintoma');
            //$table->foreignId('id_paciente')->constrained('pacientes')->onDelete('cascade');
            //$table->foreignId('id_sintoma')->constrained('sintomas')->onDelete('cascade');
            $table->foreign('id_paciente')->references('id_paciente')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_sintoma')->references('id_sintoma')->on('sintomas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosticos');
    }
};
