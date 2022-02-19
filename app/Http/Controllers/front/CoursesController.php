<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\Course;

class coursesController extends Controller
{
    public function showCat($id){
        $cats = Cat::find($id);

        $courses = Course::where('cat_id' , $id)->paginate(3);
        return \view('front.cats.course',\compact(['courses','cats']));
    }
    public function showCourse($id ,$c_id){
        $course = Course::find($c_id);
        return \view('front.course.show-course',compact('course'));


    }
}
