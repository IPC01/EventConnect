<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price'];

    // Um menu pode ter vários itens associados (relação N:N)
    public function menuItems()
    {
        return $this->hasMany(MenuItem::class, 'id_menu');
    }

    // Um menu pode estar em vários pacotes de eventos
    public function eventPackages()
    {
        return $this->hasMany(EventPackage::class, 'id_menu');
    }
}
