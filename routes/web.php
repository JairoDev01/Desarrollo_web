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
/*
Auth::routes();*/

Route::get('/', function () {
    return view('welcome');
});
//Route::resource('alumno','AlumnoController');
Route::get('alumno', 'AlumnoController@index')->name('alumno.index');
Route::get('alumno/create', 'AlumnoController@create')->name('alumno.create');
Route::post('alumno/create', 'AlumnoController@store')->name('alumno.store');
Route::get('alumno/{id}/edit', 'AlumnoController@edit')->name('alumno.edit');
Route::patch('alumno/{id}', 'AlumnoController@update')->name('alumno.update');
Route::post('alumno/{id}', 'AlumnoController@destroy')->name('alumno.destroy');
Route::get('alumno/{id}', 'AlumnoController@show')->name('empleado.show');
