<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'auth:admin'],function(){
    Route::get('/','DashboardController@index')->name('admin.dashboard');
});
Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'guest:admin'],function(){
    Route::get('login','LoginController@index')->name('get.admin.login');
    Route::post('login','LoginController@login')->name('admin.login');

});
