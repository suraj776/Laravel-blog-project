<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function view()
    {
        return view('index');
    }
    public function welcome(){
        // dd($request->error)
        return view('welcome');
    }
    // public function  view(){
    //     redirect('welcome',301)
    // }
}
 