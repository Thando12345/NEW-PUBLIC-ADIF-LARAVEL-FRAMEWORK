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
Route::get('/', function () {
    return view('Home');
});


Route::group(['middleware' => ['auth', 'role:user']], function() { 
    Route::get('/dashboard/profile', 'App\Http\Controllers\DashboardController@about')->name('dashboard.about');
});


Route::group(['middleware' => ['auth', 'role:user']], function() { 
    Route::get('/dashboard/Home', 'App\Http\Controllers\DashboardController@Home')->name('dashboard.Home');
});

//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});
// for users
Route::group(['middleware' => ['auth', 'role:user']], function() { 
    Route::get('/dashboard/profile', 'App\Http\Controllers\DashboardController@profile')->name('dashboard.profile');
});
// for incubators
Route::group(['middleware' => ['auth', 'role:incubator']], function() { 
    Route::get('/dashboard/incubator', 'App\Http\Controllers\DashboardController@incubator')->name('dashboard.incubator');
});
require __DIR__.'/auth.php';
