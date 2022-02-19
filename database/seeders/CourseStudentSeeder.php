<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1 ; $i<=20 ; $i++){
            DB::table('cource_student')->insert([
                'course_id'=> rand(1,15),
                'student_id'=> rand(1,40),
                'created_at'=> now(),
                'updated_at'=> now(),
    
            ]);
        }
    }
}
