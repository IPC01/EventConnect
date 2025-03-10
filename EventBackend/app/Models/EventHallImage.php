<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventHallImage extends Model
{
    use HasFactory;

    protected $table = 'event_hall_images';

    protected $fillable = [
        'event_hall_id',
        'image_id',
    ];

    public function eventHall()
    {
        return $this->belongsTo(EventHall::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
