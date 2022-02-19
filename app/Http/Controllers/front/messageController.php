<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsLetter;
use App\Models\Student;
use App\Models\UserMessages;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class messageController extends Controller
{
    public function NewsLetter(Request $request){
        $validate = $request->validate([
            'email'=> 'required|email'
        ]);
        
        NewsLetter::create([
            'email' => $request->email
        ]);


    }
    public function contact(Request $request){
        $validate = $request->validate([
            'message'=> 'required|string|max:191',
            'name'=> 'required|string|max:191',
            'email'=> 'required|email|max:191',
            'subject'=> 'nullable|string'
        ]);
        
        UserMessages::create([
            'message' => $request->message,
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,

            
        ]);
        


    }
    public function enroll(Request $request){
        $validate = $request->validate([
            'name'=> 'required|string|max:191',
            'email'=> 'required|email|max:191',
            'spec'=> 'required|string',
            'course_id'=> 'required'
        ]);
        $oldStudent = Student::select('id')->where('email', $validate['email'])->first();
        if($oldStudent == null){
            $student= Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'spec' => $request->spec,
            ]);
            $student_id = $student->id;
            
        }else{
            $student_id = $oldStudent->id;
            if($request->name !== null ){
                $oldStudent->update(['name'=>$request->name]) ;
               
            }
            if($request->spec !== null ){
                $oldStudent->update(['name'=>$request->spec]) ;
            }

        }
        
        
        DB::table('cource_student')->insert([
            'course_id'=> $request->course_id,
            'student_id'=> $student_id,
            'created_at'=>\now(),
            'updated_at'=>\now()
        ]);
        return \response()->json([
            'status'=> true,
            'msg'=>'<div class="alert alert-secondary">added succsfuly</div>'
        ]);

        


    }
}
