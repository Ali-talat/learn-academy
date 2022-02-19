<?php

namespace App\Http\Controllers\admin;
use App\Models\Cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class catsController extends Controller
{
    public function index(){
        $cats = Cat::orderBy('id','DESC')->get();
        return \view('admin.cats.index',\compact('cats'));
    }

    public function create(){
        return \view('admin.cats.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name'=> 'required'
        ]);

        $cat = Cat::create([
            'name'=> $request->name
        ]);
        return \redirect(\route('admin.all.cats'));
    }
    public function edit($id){
        $cat = Cat::find($id);
        return \view('admin.cats.edit',\compact('cat'));
    }

    public function update(Request $request ,$id){
        $validate = $request->validate([
            'name'=> 'required'
        ]);

        $cat = Cat::find($id);
        $cat->name = $request->name;
        $cat->save();
        return \redirect(\route('admin.all.cats'));
    }

    public function delete($id){
        $cat = Cat::find($id)->delete();
        return \redirect(\route('admin.all.cats'));
    }
}
