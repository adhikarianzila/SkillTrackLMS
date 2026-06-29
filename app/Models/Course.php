<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title', 'description', 'skills', 'status'];

    // public function skills()
    // {
    //     return $this->belongsToMany(Skill::class);
    // }
    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user')->withPivot('is_completed')->withTimestamps();
    }
}
