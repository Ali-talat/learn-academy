<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'name',
        'email',
        'desc',
        
    ];

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class,'cource_student','student_id','course_id')->withPivot('status');
    }
}
