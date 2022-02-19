<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainer;
use Illuminate\Support\Facades\Storage;

class trainerController extends Controller
{
    
        public function index(){
            $trainers = Trainer::orderBy('id','DESC')->get();
            return \view('admin.trainers.index',\compact('trainers'));
        }
    
        public function create(){
            return \view('admin.trainers.create');
        }
    
        public function store(Request $request){
            $validate = $request->validate([
                'name'=> 'required',
                'phone'=> 'required',
                'spec'=> 'required',
                'img'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $img = $request->img;
            $newImg = \time().$img->getClientOriginalName();
            $img->move('uplode/trainer', $newImg);
    
            $trainer = Trainer::create([
                'name'=> $request->name,
                'phone'=> $request->phone,
                'spec'=> $request->spec,
                'img'=> $newImg 
            ]);
            return \redirect(\route('admin.all.trainer'));
        }
        public function edit($id){
            $trainer = Trainer::find($id);
            return \view('admin.trainers.edit',\compact('trainer'));
        }
    
        public function update(Request $request ,$id){
            $validate = $request->validate([
                'name'=> 'required',
                'img'=> 'required',
                'spec'=> 'required',
                'img'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $trainer = Trainer::find($id);

            $oldName = $trainer->img ;
            if($request->has('img')){
                Storage::disk('uplode')->delete('trainer/'.$oldName);
                $img = $request->img ;
                $newImg = \time().$img->getClientOriginalName();
                $img->move('uplode/trainer', $newImg);
                $trainer->img = $newImg ;
            }
    
            $trainer->name = $request->name;
            $trainer->phone = $request->phone;
            $trainer->spec = $request->spec;
            $trainer->save();
            return \redirect(\route('admin.all.trainer'));
        }
    
        public function delete($id){

            $oldName = Trainer::find($id)->img ;
            Storage::disk('uplode')->delete('trainer/'.$oldName);
            $trainer = Trainer::find($id)->delete();
            return \redirect(\route('admin.all.trainer'));
        }
    
}
