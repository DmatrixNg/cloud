<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compose extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','course_id','title','body',
    ];

    /**
     * Get the Compose image.
     */
    public function attachment()
    {
        return $this->morphOne(Material::class, 'material');
    }
    /**
     * Get the Compose image.
     */
    public function attachments()
    {
        return $this->morphMany(Material::class, 'material');
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
