<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdmin;
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
Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::post('home/search', 'HomeController@search');
Route::middleware([CheckAdmin::class])->group(function () {
    Route::get('admin', 'HomeController@admin');
    Route::get('admin/users', 'HomeController@users');
    Route::get('admin/racks', 'RackController@index')->name('index');
    Route::get('admin/racks/create', 'RackController@create')->name('create');
    Route::post('admin/racks', 'RackController@store')->name('store');
    Route::get('admin/racks/{rack}/edit', 'RackController@edit')->name('edit');
    Route::put('admin/racks/{rack}', 'RackController@update')->name('update');
    Route::delete('/admin/racks/{rack}', 'RackController@destroy')->name('destroy');
    Route::get('admin/books', 'BookController@index')->name('index');
    Route::get('admin/books/create', 'BookController@create')->name('create');
    Route::post('admin/books', 'BookController@store')->name('store');
    Route::get('admin/books/{book}/edit', 'BookController@edit')->name('edit');
    Route::put('admin/books/{book}', 'BookController@update')->name('update');
    Route::delete('/admin/books/{book}', 'BookController@destroy')->name('destroy');
});
