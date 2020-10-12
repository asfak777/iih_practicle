<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');

//tables
Route::post('/tables/create', 'Api\TableController@createTable');
Route::post('/tables/update', 'Api\TableController@updateTable');
Route::get('/tables/delete', 'Api\TableController@deleteTable');

//table columns
Route::post('/tables-columns/store', 'Api\TableController@storeTableColumns');
Route::get('/tables-columns/edit', 'Api\TableController@editTableColumns');
Route::post('/tables-columns/update', 'Api\TableController@updateTableColumns');
Route::post('/tables-columns/delete', 'Api\TableController@deleteTableColumns');
