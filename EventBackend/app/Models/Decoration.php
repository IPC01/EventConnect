<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decoration extends Model {
    use HasFactory;

    protected $table = 'decoration';

    protected $fillable = [
        'name',
        'description',
        'price',
        'base_img',
    ];
}
