<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Crear tabla estatus
        Schema::create('estatus', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');  // Ejemplo: 'Procesando', 'Enviado', 'Entregado'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estatus');
    }
};
