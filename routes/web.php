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

// Route::get('/home', function () {
//     return view('welcome');
// });

Auth::routes();

$router->group(['middleware' => ['auth','checkstatus']], function($router) {

	Route::get('/', function () {
	    return view('home');
	})->name('home');

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    //tables
    Route::get('/tables', 'TableController@index')->name('tables.index');
    Route::get('/tables/listing', 'TableController@getListing')->name('tables.listing');
});