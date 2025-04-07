<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
use Illuminate\Support\Facades\Hash;
>>>>>>> main

class User extends Authenticatable
{
    use HasFactory, Notifiable;

<<<<<<< HEAD
=======
    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
>>>>>>> main
    protected $fillable = [
        'name',
        'email',
        'password',
        'direccion',
        'telefono',
        'nombres',
        'apellidos',
    ];

<<<<<<< HEAD
=======
    /**
     * Los atributos que deben ser ocultados para los arreglos.
     *
     * @var array<int, string>
     */
>>>>>>> main
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array<int, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Setea la contraseña de forma segura.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
