<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'id_role',
        'phone',
        'address',
        'id_img'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relação com Role (um usuário pertence a um papel)
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }
    

    // Relação com Order (um usuário pode ter vários pedidos)
    public function orders()
    {
        return $this->hasMany(Order::class, 'id_user');
    }

    // Relação com EventHall (um usuário pode gerenciar vários salões)
    public function eventHalls()
    {
        return $this->hasMany(EventHall::class, 'id_user');
    }
}
