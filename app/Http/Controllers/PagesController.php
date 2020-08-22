<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;

class PagesController extends Controller
{

        public function home(){
            return View::make('welcome');
        }
    // public function home(){
    //     Cache::remember('foo', 60, function () {
    //         return 'foobar';
    //     });

    //     return Cache::get('foo');
        // return File::get(public_path('index.php'));


}
