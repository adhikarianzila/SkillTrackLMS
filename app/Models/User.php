<?php

namespace App\Models;
use App\Models\Course;
use App\Models\StudentSkill;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = ['password', 'remember_token'];

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

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_user')->withPivot('is_completed')->withTimestamps();
    }
    public function completedCourses()
    {
        return $this->belongsToMany(Course::class, 'course_user')->wherePivot('is_completed', 1);
    }

    public function studentSkills()
    {
        return $this->hasMany(StudentSkill::class, 'student_id');
    }
}
