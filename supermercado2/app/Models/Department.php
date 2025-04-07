<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'status'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function managers()
    {
        return $this->hasMany(DepartmentManager::class);
    }

    public function employees()
    {
        return $this->hasMany(DepartmentEmployee::class);
    }
}