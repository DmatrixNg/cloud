<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecturer_id','level','course','course_code'
    ];

    public function lecturer()
    {
        # get lecturer

        return $this->belongsTo(Lecturer::class);
    }
    public function student_course()
    {
        # get lecturer

        return $this->hasMany(StudentCourse::class);
    }

    public function students()
    {
        # get student

        // return $this->belongsToMany(User::class, StudentCourse::class,'id','user_id','id','id');
        
        return $this->belongsToMany(User::class, 'student_courses','user_id','course_id');

    }
}
