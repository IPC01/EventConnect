<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
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
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // Relação com Role (um usuário pertence a um papel)
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }
    public function getIsAdminAttribute()
    {
        // Verifique se o campo id_role do usuário é 1
        return $this->id_role === 1; // ou qualquer outra lógica que você usar para indicar um admin
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
    public function image()
{
    return $this->belongsTo(Image::class, 'id_img');
}
}
