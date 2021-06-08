<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Route::get('/', function () {
    return view('posts');
});

Route::get('/post',function(){
    return view('post');
});

// imagine u are taking posts as id from db but here you are taking from html files into posts folder

Route::get('posts/{post}',function($slug){
    //find a post by it's slug and pass it to a view called "post"

    return view('post',
    [
        'post' => Post::find($slug)
    ]);
    /*
    $path = __DIR__ . "/../resources/posts/{$slug}.html";
    if(!file_exists($path)){
        //dd( ' file does not exist'); // to die the excution of operation 
        //abort(404); to make an 404 error here
        return redirect('/'); //to redirect the user to home page
    }

    //this code for caching times of rendering and get request and make limit for them
    $post = cache()->remember('posts.$slug', 5, function () use($path) {
        var_dump('ahmadsaleh');
        return file_get_contents($path);
    });

    return view('post',[
        'post' => $post
    ]);*/
});