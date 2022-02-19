<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Trainer extends Model
{
    use HasFactory;
    protected $fillable = ['name',	'phone',	'spec',	'img'];
    

    /**
     * Get all of the courses for the Trainer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class ,'course_id');
    }
}
