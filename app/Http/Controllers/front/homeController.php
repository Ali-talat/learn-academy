<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Trainer;
use App\Models\Student;
use App\Models\SideContent;
use App\Models\Test;

class homeController extends Controller
{
    public function index(){
        $courses  = Course::orderBy('id','desc')->take(3)->get();
        $courses_count  = Course::count();
        $trainers_count  = trainer::count();
        $students_count = student::count();
        $tests= Test::all();
        $banner = SideContent::where('name','banner')->first();
        $feature = SideContent::where('name','feature')->first();
        
        
        return view('front.index',\compact(['courses','courses_count','trainers_count','students_count','tests','banner','feature']));
    }
}
