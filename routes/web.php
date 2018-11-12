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

Route::get('/', function () {
    return view('home');
});

Route::get('/book', 'BookController@index');
Route::get('/book/add', 'BookController@pageAdd');
Route::post('/book/add_post', 'BookController@add');

Route::get('/book_test', 'BookController@testSaveImage');

Route::get('/book/cover/{id}', function($id)
{
    $user = App\Book::find($id);
    $response = Response::make($user->image, 200);
    $response->header('Content-Type', $user->image_mimetype);
    return $response;
});

Route::get('/addmany', 'BookController@addManyBooks');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
