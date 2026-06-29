<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSkill extends Model
{
    protected $fillable = ['student_id', 'skill_id', 'progress'];
}
