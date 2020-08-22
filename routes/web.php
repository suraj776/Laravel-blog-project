<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// app()->bind('App\Example',function(){
//     $collaborator = new \App\Collaborator();
//     $foo = 'foobar';

//     return new \App\Example($collaborator ,$foo);
// });

// Route::get('/','PagesController@home');

// Route::get('/home',function(){
//     return view('index',[
//         'name'=>request('name')
//     ]);
// });
//Alternative to method above
// Route::get('/home/{post}', function () {
//     return view('index');
// });

// Route::get('/posts/{post}', function ($post){
//     // $posts = [
//     //     "my-first-post"=> "Hello, this is my first blog post",
//     //     "my-second-post"=>"Now i'm getting the hang of this blogging thing"
//     // ];

//     if(!array_key_exists($post,$posts))
//     {
//         abort(404,"Sorry, this post doesn't exists");
//     }

//     return view('post', [
//         'post' => $posts[$post] ?? "Nothing here yet"
//     ]);
// });

// Route::get('/posts/{post}', 'PostsController@show');

// Route::get('/welcome','UserController@welcome');
// // Route::redirect('/index','/welcome',301);

use App\Http\Controllers\ArticlesController;

Route::get('simplework', function () {
    return view('simplework');
});
//  Route::get('/layout', function () {
//      return view('layout');
//  });
Route::get('/about', function () {

   //$article = App\Article::all(); // for all data in database
    //$article = App\Article::take(2)->get(); // --> it will bring only two record from database
   // $article = App\Article::paginate(2); // --> it will paginate the record according to their number
   //$article =   App\Article::latest()->get(); // order by created_at desc, we can also pass 'created_at','updated_at' for the desired order of data
    // return $article;

    return view('about', [
        'articles' => App\Article::take(3)->latest()->get()
    ]);
});

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::post('articles', 'ArticlesController@store');
Route::get('articles/create', 'ArticlesController@create');
Route::get('articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::get('articles/{article}/edit','ArticlesController@edit');
Route::put('/articles/{article}','ArticlesController@update');

// Crude operation
//GET,POST,PUT,DELETE


//GET /articles
// GET /articles/:id
//POST /articles
// PUT/articles/:id //doesn't matter what u use out of put and patch
// DELETE/articles/:id/
// GET /videos
// GET /videos/create
// GET /videos/2

// PUT /videos/2/edit
// PUT /videos/2
// DELETE /videos/2

//POST /videos/subscriptions => VideoSubscriptionController@store

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
