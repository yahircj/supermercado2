<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestockTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_alert_id', 'assigned_to', 'assigned_by',
        'quantity_required', 'status', 'completed_at'
    ];

    public function stockAlert()
    {
        return $this->belongsTo(StockAlert::class);
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function assigner()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }
}