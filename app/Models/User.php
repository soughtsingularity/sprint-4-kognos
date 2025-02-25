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
    
    protected $keyType = 'string';
    public $incrementing = false;
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

        /**
     * Relación muchos a muchos con cursos.
     *
     * @return BelongsToMany
     */

     public function courses()
     {
         return $this->belongsToMany(Course::class, 'course_user')
             ->withPivot('progress', 'medal')
             ->withTimestamps();
     }
 }
