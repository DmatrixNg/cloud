<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function lecturer()
    {
        return $this->hasOne(Lecturer::class);
    }

    public function courses()
    {
        return $this->hasManyThrough(Course::class, StudentCourse::class,'user_id','id','id','course_id');
    }

    public function composes()
    {
        return $this->hasMany(Compose::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function my_lecturer()
    {
        $lecturers =[];

        foreach ($this->courses()->get() as $course) {
            if (!in_array($course->lecturer_id, $lecturers)) {
                $lecturers[] = $course->lecturer_id;
            }
        }
        
        return Lecturer::whereIn('id',$lecturers)->get();
        
    }
}

