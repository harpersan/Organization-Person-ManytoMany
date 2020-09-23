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

Route::get('/', 'PersonController@index');

Route::get('/add-person', 'PersonController@create');
Route::post('/store-person', 'PersonController@store');
Route::get('/edit-person/{id}', 'PersonController@edit');
Route::post('/update-person/{id}', 'PersonController@update');
Route::get('/delete-person/{id}', 'PersonController@destroy');

Route::get('/add-organization', 'OrganizationController@create');
Route::post('/store-organization', 'OrganizationController@store');
Route::get('/edit-organization/{id}', 'OrganizationController@edit');
Route::post('/update-organization/{id}', 'OrganizationController@update');
Route::get('/delete-organization/{id}', 'OrganizationController@destroy');


