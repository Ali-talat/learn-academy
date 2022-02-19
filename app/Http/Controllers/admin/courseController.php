<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Trainer;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class courseController extends Controller
{
    
    public function index(){
        $courses = Course::orderBy('id','DESC')->paginate(5);
        return \view('admin.course.index',\compact('courses'));
    }

    public function create(){
        $cats= Cat::select('name','id')->get();
        $trainer= trainer::select('name','id')->get();
        return \view('admin.course.create',\compact(['trainer','cats']));
    }

    public function store(Request $request){
        $validate = $request->validate([
            'cat_id'=> 'required|exists:cats,id',
            'trainer_id'=> 'required|exists:trainers,id',
            'name'=> 'required',
            'price'=> 'required',
            'small_desc'=> 'required',
            'desc'=> 'required',
            'img'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $img = $request->img;
        $newImg = \time().$img->getClientOriginalName();
        $img->move('uplode/course', $newImg);

        $course = Course::create([
            'name'=> $request->name,
            'price'=> $request->price,
            'small_desc'=> $request->small_desc,
            'desc'=> $request->desc,
            'cat_id'=> $request->cat_id,
            'trainer_id'=> $request->trainer_id,
            'img'=> $newImg 
        ]);
        return \redirect(\route('admin.all.course'));
    }
    public function edit($id){
        $cats= Cat::select('name','id')->get();
        $trainer= trainer::select('name','id')->get();
        $course = Course::find($id);
        return \view('admin.course.edit',\compact(['course','cats','trainer']));
    }

    public function update(Request $request ,$id){
        $validate = $request->validate([
            'name'=> 'required',
            'price'=> 'required',
            'small_desc'=> 'required',
            'desc'=> 'required',
            'cat_id'=> 'required|exists:cats,id',
            'trainer_id'=>'required|exists:trainers,id',
            'img'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $course = Course::find($id);

        $oldName = $course->img ;
        if($request->has('img')){
            Storage::disk('uplode')->delete('course/'.$oldName);
            $img = $request->img ;
            $newImg = \time().$img->getClientOriginalName();
            $img->move('uplode/course', $newImg);
            $course->img = $newImg ;
        }

        $course->name = $request->name;
        $course->price = $request->price;
        $course->small_desc = $request->small_desc;
        $course->desc = $request->desc;
        $course->cat_id = $request->cat_id;
        $course->trainer_id = $request->trainer_id;
        $course->save();
        return \redirect(\route('admin.all.course'));
    }

    public function delete($id){

        $oldName = Course::find($id)->img ;
        Storage::disk('uplode')->delete('course/'.$oldName);
        $course = Course::find($id)->delete();
        return \redirect(\route('admin.all.course'));
    }

}
