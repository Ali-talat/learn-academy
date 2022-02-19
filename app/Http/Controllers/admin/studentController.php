<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class studentController extends Controller
{
    
    public function index(){
        $students = Student::orderBy('id','DESC')->paginate(5);
        return \view('admin.student.index',\compact('students'));
    }

    public function create(){
        return \view('admin.student.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:students',
            'spec'=> 'nullable|string|max:50',
        ]);

        

        $Student = Student::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'spec'=> $request->spec
        ]);
        return \redirect(\route('admin.all.student'));
    }
    public function edit($id){
        $student = Student::find($id);
        return \view('admin.student.edit',\compact('student'));
    }

    public function update(Request $request ,$id){
        $validate = $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:students',
            'spec'=> 'nullable',
        ]);
        $student = Student::find($id);

        

        $student->name = $request->name;
        $student->email = $request->email;
        $student->spec = $request->spec;
        $student->save();
        return \redirect(\route('admin.all.student'));
    }

    public function delete($id){

        $oldName = Student::find($id)->img ;
        Storage::disk('uplode')->delete('student/'.$oldName);
        $Student = Student::find($id)->delete();
        return \redirect(\route('admin.all.student'));
    }

    public function show($id){

        $courses = Student::find($id)->courses;
        $student_id = Student::find($id);
        return \view('admin.student.show',\compact(['courses','student_id']));
    }

    public function approve($id,$c_id){

        
        DB::table('cource_student')->where(['student_id'=>$id , 'course_id'=>$c_id])->update([
            'status'=>'approve'
        ]);
        
        return \back();
    }

    public function reject($id ,$c_id){

        DB::table('cource_student')->where(['student_id'=>$id, 'course_id'=>$c_id])->update([
            'status'=>'reject'
        ]);
        return \back();
    }


    public function addCourse($id ){

        $courses = Course::all();
        $student = Student::find($id);
        return \view('admin.student.addCourse',\compact(['courses','student']));
    }

    public function storeCourse($id , Request $request){
        $request->validate([
            'course_id'=>'required|exists:courses,id',
        ]);

        DB::table('cource_student')->insert([
            'student_id'=>$request->id,
            'course_id'=> $request->course_id
        ]);
        return \redirect(route('admin.student.show',$id));
    }


}
