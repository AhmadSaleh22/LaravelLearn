<?php

use Illuminate\Support\Facades\Route;

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
    $path = __DIR__ . "/../resources/posts/{$slug}.html";
    if(!file_exists($path)){
        dd( ' file does not exist'); // to die the excution of operation 
        //abort(404); to make an 404 error here
        //return redirect('/'); to redirect the user to home page
    }

    $post = file_get_contents($path);

    return view('post',[
        'post' => $post
    ]);
});