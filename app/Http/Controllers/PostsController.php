<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Post;

class PostsController extends Controller
{
    //
    public function show($slug){
        //don't need to revoke Db class \ let access DB globally
        //$post = \DB::table('posts')->where('slug',$slug)->first();
        //Alternative of above
        // $post = DB::table('posts')->where('slug',$slug)->first();

        // $posts = [
        //     "my-first-post"=> "Hello, this is my first blog post",
        //     "my-second-post"=>"Now i'm getting the hang of this blogging thing"
        // ];

        return view('post', [
            'post' => Post::where('slug',$slug)->firstOrFail()
        ]);
    }
}
