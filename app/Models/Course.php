<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_id',
        'trainer_id',
        'name',
        'price',
        'small_desc',
        'desc',
        'img',
    ];

    /**
     * Get the cats that owns the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cats(): BelongsTo
    {
        return $this->belongsTo(Cat::class,'cat_id');
    }
    public function trainers(): BelongsTo
    {
        return $this->belongsTo(Trainer::class,'trainer_id');
    }

    /**
     * The roles that belong to the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class,'course_student','course_id','student_id');
    }


    
    						
}
