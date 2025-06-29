<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['id_user','id_package','id_event_type','budget', 'nr_guests', 'event_start_date','event_end_date','status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
       public function eventType()
    {
        return $this->belongsTo(EventType::class, 'id_event_type');
    }
}
