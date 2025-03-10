<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name']; // Permite atribuição em massa

    /**
     * Relacionamento com os itens (pratos) que pertencem a essa categoria.
     */
    public function items()
    {
        return $this->hasMany(Item::class, 'id_category');
    }
    
    use HasFactory;
}
