<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decoration extends Model {
    use HasFactory;

    protected $table = 'decorations';

    protected $fillable = [
        'name',
        'description',
        'price',
        'base_img',
        'id_user'
    ];

    public function images()
    {
        return $this->belongsToMany(Image::class,'decoration_imgs', 'id_decoration','id_img'); // Relacionamento um-para-muitos
    }
}
