<?php

use App\Http\Controllers\Admin\CardsController;
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
    Route::get('edit-personal-data','CpanelController@edit')->name('admin.edite.personal.data');
    Route::post('edit-personal-data','CpanelController@update')->name('admin.update.personal.data');
    Route::get('edit-personal-password','CpanelController@edit_pass')->name('admin.edit.pass.data');
    Route::post('edit-personal-password','CpanelController@update_pass')->name('admin.update.pass.data');
    Route::get('logout','LoginController@logout')->name('admin.logout');
        ################################# cards Route ###################################
Route::group(['prefix'=>'Identification_Cards'],function(){
    Route::get('/','CardsController@index')->name('admin.index.cards');
    Route::get('/create','CardsController@create')->name('admin.create.cards');
    Route::post('/store','CardsController@store')->name('admin.store.cards');
    Route::get('/edit/{id}','CardsController@edit')->name('admin.edit.cards');
    Route::post('/update/{id}','CardsController@update')->name('admin.update.cards');
    Route::get('/delete/{id}','CardsController@delete')->name('admin.delete.cards');
});
});
Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'guest:admin'],function(){
    Route::get('login','LoginController@index')->name('get.admin.login');
    Route::post('login','LoginController@login')->name('admin.login');

});
