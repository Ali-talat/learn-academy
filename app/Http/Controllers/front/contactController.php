<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class contactController extends Controller
{
    public function index(){
        $setting = Setting::first();
        return \view('front.contact.contact',\compact('setting'));

    }
}
