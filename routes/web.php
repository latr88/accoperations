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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::post('/add-account', 'AccountController@add');
Route::post('/add-operation', 'OperationsController@add');

Route::get('/', 'HomeController@index')->name('welcome-home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/accounts', 'AccountController@index');

Route::get('/add-account', function () {
    return view('accounts.add-account');
});

Route::get('/add-operation', function () {
    return view('operations.add-operation');
});