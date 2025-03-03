<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventHall extends Model
{
    use HasFactory;

    protected $fillable = ['id_user', 'name', 'address', 'capacity', 'price'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

 
}
