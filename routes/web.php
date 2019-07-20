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

/**
 * Pubic pages no verification required
 */
Route::get('/', 'HomeController@index');
Route::get('/contact', 'HomeController@contact');
Route::get('/calendar', 'HomeController@calendar');

Auth::routes(['verify' => true]);
/**
 * These pages with prompt for verification rather than redirect!
 */
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Redirect the user to the email verification page.
 */
Route::group(['middleware' => 'verified'], function(){
    Route::resource('user', 'UserController');
    Route::put('/user/{user}/address', 'UserController@address');
    Route::put('/user/{user}/phone', 'UserController@phone');
    Route::put('/user/{user}/birthdate', 'UserController@birthdate');

    Route::delete('/user/{user}/phone/{phone}', 'UserController@phoneDelete');
    Route::patch('/user/{user}/phone/{phone}', 'UserController@phoneUpdate');
});