<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'users'], function() {
    Route::get('/', 'App\Http\Controllers\User\IndexUserController@index')->name('users.index');
    Route::get('/{id}/show', 'App\Http\Controllers\User\ShowUserController@show')->name('users.show');
    Route::get('/create', 'App\Http\Controllers\User\CreateUserController@create')->name('users.create');
    Route::post('/', 'App\Http\Controllers\User\CreateUserController@store')->name('users.store');
    Route::get('/{id}/edit', 'App\Http\Controllers\User\UpdateUserController@edit')->name('users.edit');
    Route::put('/{id}', 'App\Http\Controllers\User\UpdateUserController@update')->name('users.update');
    Route::delete('/{id}/softDelete', 'App\Http\Controllers\User\DeleteUserController@softDeleteUser')->name('users.softDelete');
    Route::delete('/{id}', 'App\Http\Controllers\User\DeleteUserController@delete')->name('users.destroy');
});

