<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
    return view('front.layouts.master',compact('setting'));
    }
}
