<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_create_pedidos_table.php

public function up()
{
    Schema::create('pedidos', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('cliente_id');  // Cliente relacionado
        $table->string('direccion');
        $table->string('correo');
        $table->string('telefono');
        $table->string('nombres');
        $table->string('apellidos');
        $table->string('codigo_postal');
        $table->decimal('total', 10, 2);  // Total del pedido
        $table->timestamps();

        // Relacionamos con el cliente (si tienes una tabla de clientes)
        $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
