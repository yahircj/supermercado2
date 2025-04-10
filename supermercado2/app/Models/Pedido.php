<?php

// App\Models\Pedido.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id', 'direccion', 'correo', 'telefono', 'nombres', 'apellidos', 'codigo_postal', 'total', 'estatus'
    ];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    // Relación con productos
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pedido_producto', 'pedido_id', 'producto_id');
    }
}
