<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'Auth\LoginController@login');
Route::post('/register', 'Auth\RegisterController@create');

Route::get('galleries', 'GalleriesController@index');
Route::get('author/{id}', 'UsersController@getAuthorGalleries');
Route::get('galleries/{id}', 'GalleriesController@show');
Route::get('galleries/{id}/comments', 'GalleriesController@getGalleryComments');


Route::middleware('jwt')->post('galleries', 'GalleriesController@store');
Route::middleware('jwt')->get('my-galleries', 'UsersController@getUserGalleries');

Route::middleware('jwt')->post('galleries/{id}/comments', 'CommentsController@store');

Route::middleware('jwt')->delete('galleries/{id}', 'GalleriesController@destroy');
Route::middleware('jwt')->put('edit-gallery/{id}', 'GalleriesController@update');









