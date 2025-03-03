<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = ['id_menu', 'id_item'];

    // Um MenuItem pertence a um menu
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }

    // Um MenuItem pertence a um item
    public function item()
    {
        return $this->belongsTo(Item::class, 'id_item');
    }
}
