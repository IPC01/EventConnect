<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DecorationImg extends Model
{
    use HasFactory;

    protected $fillable = ['id_img', 'id_decoration'];

    // Relação com a tabela de imagens
    public function image()
    {
        return $this->belongsTo(Image::class, 'id_img');
    }

    // Relação com a tabela de decorações
    public function decoration()
    {
        return $this->belongsTo(Decoration::class, 'id_decoration');
    }
}
