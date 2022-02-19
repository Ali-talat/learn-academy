<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'cat_id'=>1,
            'trainer_id'=>1,
            'name'=>'laravel',
            'price'=>5000,
            'small_desc'=>'it is a good one ',
            'desc'=>'laravel',
            'img'=>'1.png',
        ]);
        Course::create([
            'cat_id'=>2,
            'trainer_id'=>2,
            'name'=>'php',
            'price'=>4000,
            'small_desc'=>'it is a good one ',
            'desc'=>'js',
            'img'=>'2.png',
        ]);
        Course::create([
            'cat_id'=>3,
            'trainer_id'=>3,
            'name'=>'js',
            'price'=>6000,
            'small_desc'=>'it is a good one ',
            'desc'=>'js',
            'img'=>'3.png',
        ]);
        Course::create([
            'cat_id'=>1,
            'trainer_id'=>1,
            'name'=>'laravel',
            'price'=>5000,
            'small_desc'=>'it is a good one ',
            'desc'=>'laravel',
            'img'=>'1.png',
        ]);
        Course::create([
            'cat_id'=>2,
            'trainer_id'=>2,
            'name'=>'php',
            'price'=>4000,
            'small_desc'=>'it is a good one ',
            'desc'=>'js',
            'img'=>'2.png',
        ]);
        Course::create([
            'cat_id'=>3,
            'trainer_id'=>3,
            'name'=>'js',
            'price'=>6000,
            'small_desc'=>'it is a good one ',
            'desc'=>'js',
            'img'=>'3.png',
        ]);
        
        	
    }
}
