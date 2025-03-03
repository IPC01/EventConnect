<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url_img'];

    // Uma imagem pode estar associada a várias decorações
    public function decorationImgs()
    {
        return $this->hasMany(DecorationImg::class, 'id_img');
    }

    // Uma imagem pode estar associada a vários itens de menu
    public function items()
    {
        return $this->hasMany(Item::class, 'id_img');
    }
}
