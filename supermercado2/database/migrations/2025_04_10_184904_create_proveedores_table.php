<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique(); // Nombre del proveedor (ej: "Distribuidora ACME")
            $table->string('ruc')->unique()->nullable(); // RUC o identificador fiscal
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('contacto_nombre')->nullable(); // Persona de contacto
            $table->string('contacto_telefono')->nullable();
            $table->text('notas')->nullable(); // Observaciones
            $table->boolean('activo')->default(true); // Para habilitar/deshabilitar
            $table->timestamps();
            $table->softDeletes(); // Borrado lógico (opcional)
        });

        // Relación con productos (opcional)
        Schema::table('productos', function (Blueprint $table) {
            $table->foreignId('proveedor_id')
                ->nullable()
                ->constrained('proveedores')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        // Eliminar relación primero (si existe)
        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign(['proveedor_id']);
            $table->dropColumn('proveedor_id');
        });

        Schema::dropIfExists('proveedores');
    }
};