<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = ['id_order', 'id_package', 'total_price'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'id_order');
    }

    public function eventHall(): BelongsTo
    {
        return $this->belongsTo(EventPackage::class, 'id_package');
    }
}
