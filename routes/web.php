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
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {

    return view('about', [
        'articles' => App\Models\Article::latest()->get()
    ]);

});

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::get('/articles/{article}/edit', 'ArticlesController@edit');
Route::post('/articles', 'ArticlesController@store');
Route::put('/articles/{article}', 'ArticlesController@update');


//basic routing wildcard

//Route::get('/posts/{post}', function ($post) {
//
//    $posts = [
//        'my-first-post' => 'Hello, this is my first blog post!',
//        'my-second-post' => 'Now I am getting the hang of this blogging thing.',
//    ];
//
//    if(! array_key_exists($post, $posts)){
//        abort(404, 'Sorry, that post was not found');
//    }
//
//    return view('post', [
//        'post' => $posts[$post]
//    ]);
//
//});

//routing using controller, laravel 8.x syntax

Route::get('/posts/{post}', 'PostsController@show');

