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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view('home', 'home')
// 	->name('home')
// 	->middleware(['auth', 'verified']);

Route::get('/', function () {
    return redirect('login');
});


Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'admin'], function () {

        Route::get('dashboard','DashboardController@index')->name('dashboard');
        Route::get('settings', 'DashboardController@settings')->name('settings');
        Route::post('updateprofile', 'DashboardController@updateProfile')->name('updateprofile');
        Route::post('changepassword', 'DashboardController@changePassword')->name('changepassword');

        Route::group(['middleware' => ['admin']], function () {

            //user
            Route::get('user', 'UserController@index')->name('user');
            Route::get('user/getdata', 'UserController@getAjaxData')->name('user.get-ajax-data');
            Route::get('user/add', 'UserController@add')->name('user.add');
            Route::post('user/store', 'UserController@store')->name('user.store');
            Route::get('user/edit', 'UserController@edit')->name('user.edit');
            Route::get('user/delete', 'UserController@delete')->name('user.delete');
            Route::get('user/delete/media', 'UserController@deleteMedia')->name('user.delete.media');
            Route::post('user/changepassword', 'UserController@changePassword')->name('user.changepassword');
            Route::get('user/block', 'UserController@block')->name('user.block');

        });

        Route::get('page/general', function () {
            return view('page.general');
        })->name('general');

        Route::post('page/general/store', 'PageController@general')->name('general.store');
        Route::get('page/social', 'PageController@social')->name('social');
        Route::post('page/social/store', 'PageController@socialStore')->name('social.store');

        Route::get('logout', function ()
        {
            auth()->logout();
            Session()->flush();
            return Redirect::to('/');
        })->name('logout');

        Route::get('template', function () {
            return view('template');
        })->name('template');

    });

    Route::get('/link/{username}', 'PageController@view')->name('page');

 });
