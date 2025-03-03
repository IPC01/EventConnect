<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPackage extends Model
{
    use HasFactory;

    protected $fillable = ['id_event_hall', 'id_menu', 'id_decoration', 'total_price'];

    // O pacote de evento pertence a um salão de eventos
    public function eventHall()
    {
        return $this->belongsTo(EventHall::class, 'id_event_hall');
    }

    // O pacote de evento inclui um menu
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }

    // O pacote de evento inclui uma decoração
    public function decoration()
    {
        return $this->belongsTo(Decoration::class, 'id_decoration');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reserve::class, 'id_package');
    }
}
