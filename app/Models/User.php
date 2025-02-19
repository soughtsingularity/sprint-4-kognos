<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;    
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'role'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['password' => 'hashed'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($user){
            //$user->password = bcrypt($user->password);
            $user->id = (string) \Illuminate\Support\Str::uuid();
        });
    }
}
