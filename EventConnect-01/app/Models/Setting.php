<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'cancel_start_fee', 
        'cancel_end_fee', 
        'late_pct', 
        'on_time_pct', 
        'base_time'
    ];
}
