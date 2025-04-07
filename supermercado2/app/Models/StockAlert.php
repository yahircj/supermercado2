<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAlert extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'department_id', 
        'current_stock', 'min_stock', 'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function restockTask()
    {
        return $this->hasOne(RestockTask::class);
    }
}