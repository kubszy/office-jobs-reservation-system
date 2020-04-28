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


Auth::routes();
Route::get('/logout' , 'Auth\LoginController@logout');
Route::get('/', function () {
    return redirect('/home');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('equipments', 'EquipmentController');
Route::resource('workplaces', 'WorkplaceController');

Route::post('/attach-equipment', 'WorkplaceController@attachEquipment')->name('attachEquipment');
Route::post('/remove-equipment', 'WorkplaceController@removeEquipment')->name('removeEquipment');
