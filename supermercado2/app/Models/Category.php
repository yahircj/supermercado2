<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['department_id', 'name', 'description', 'image', 'status'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
