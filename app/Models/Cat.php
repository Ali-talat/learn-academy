<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cat extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    /**
     * Get all of the courses for the Cat
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class,'cat_id');
    }
}
