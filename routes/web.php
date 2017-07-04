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


Route::get('blog/{id}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle']);
Route::get('arhiva', ['uses' => 'BlogController@getArhiva', 'as' => 'blog.arhiva']);

Route::get('/', 'PagesController@getIndex');
Route::get('/home', 'PagesController@getIndex');
Route::get('o_meni', 'PagesController@getO_meni');
Route::get('kontakt', 'PagesController@getKontakt');
Route::post('kontakt', 'PagesController@postKontakt');

Route::resource('posts', 'PostController');
Auth::routes();

//Logout nije radio zbog laravelovog update-a pa je ova ruta rješenje za to
Route::get('/logout', 'Auth\LoginController@logout');

// Comentari
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);


