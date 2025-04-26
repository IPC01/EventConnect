<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'id_img','id_user','id_category'];

    // Um item pode ter uma imagem associada
    public function image()
    {
        return $this->belongsTo(Image::class, 'id_img');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_items', 'id_item', 'id_menu');
    }

    // Um item pode pertencer a vários menus
    public function menuItems()
    {
        return $this->hasMany(MenuItem::class, 'id_item');
    }
}
