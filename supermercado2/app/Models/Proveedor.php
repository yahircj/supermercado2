<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use SoftDeletes; // Opcional

    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'ruc',
        'direccion',
        'telefono',
        'email',
        'contacto_nombre',
        'contacto_telefono',
        'notas',
        'activo'
    ];

    // Relación con productos (opcional)
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}