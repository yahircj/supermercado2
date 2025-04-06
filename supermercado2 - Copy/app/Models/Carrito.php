<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $fillable = ['user_id'];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'carrito_productos')
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }
}
