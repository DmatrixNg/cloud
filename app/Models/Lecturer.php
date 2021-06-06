<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','about'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        # courses
        return $this->hasMany(Course::class);
    }

    public function students()
    {
        $student =[];

        foreach ($this->hasManyThrough(StudentCourse::class, Course::class)->get() as $course) {
            if (!in_array($course->user_id, $student)) {
                $student[] = $course->user_id;
            }
        }
        
        return User::whereIn('id',$student)->get();
        
    }

    // public function studentsObject()
    // {
    //     return $this->hasManyThrough(StudentCourse::class, Course::class);

    // }

}
