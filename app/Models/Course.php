<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['title', 'description', 'content'];
    protected $casts = [
        'content' => 'array'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($course){
            $course->id = (string) Str::uuid();
            $course->content = $course->content ?? [];
        });
    }

    public function getChapters()
    {
        $chapters = json_decode($this->content, true);
        return is_array($chapters) ? $chapters : [];
    }


        /**
     * Relación muchos a muchos con usuarios.
     *
     * @return BelongsToMany
     */

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user')
            ->withPivot('progress', 'medal')
            ->withTimestamps();
    }
}
