<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCantidadToPedidoProductoTable extends Migration
{
    public function up()
    {
        Schema::table('pedido_producto', function (Blueprint $table) {
            $table->integer('cantidad')->default(1);
        });
    }

    public function down()
    {
        Schema::table('pedido_producto', function (Blueprint $table) {
            $table->dropColumn('cantidad');
        });
    }
}
