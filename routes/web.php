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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/articles', 'ArticleController@showArticles');

Route::get('/articles/create', 'ArticleController@createForm');

Route::get('/articles/{id}', 'ArticleController@show');

Route::post('/articles/create', 'ArticleController@store');

Route::get('/articles/{id}/delete', 'ArticleController@delete');

Route::get('/articles/{id}/edit', 'ArticleController@editForm');

Route::get('/articles/{id}/{a_id}/deleteComment', 'CommentController@deleteComment');

Route::post('/articles/{id}/edit', 'ArticleController@update');

Route::post('/articles/{id}', 'CommentController@comment');

Route::get('/profile', 'ProfileController@showIndex');

Route::get('/profile/{id}/delete', 'ProfileController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@showArticle');

Route::post('/articles/{id}/show', 'ArticleController@showCategory');

