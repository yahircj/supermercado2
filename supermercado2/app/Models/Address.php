<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'street', 'ext_number', 'int_number', 
        'neighborhood', 'city', 'state', 'postal_code', 
        'references', 'is_default'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
