<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // relation: user membuat banyak item
    public function items()
    {
        return $this->hasMany(Item::class, 'created_by');
    }

    // helper
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
