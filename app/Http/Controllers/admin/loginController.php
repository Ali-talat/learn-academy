<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
// use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login(){
    // if(\auth()->guard('admin')->check()){
    //     return \redirect(\route('admin.home'));
    // }
    return \view('admin.login');

    }
    public function doLogin(Request $request){
        return 'good';
        if(!auth()->attempt(['email'=>$request->email , 'password'=>$request->password])){
        return \back();

        }else{
            
            return \redirect()->route('admin.home');
        }
    }

    public function logout(){
        \auth()->guard('admin')->logout();
        return \redirect()->route('admin.login');
    }
}
