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

Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
Route::get('/invitation/{user}', ['as' => 'dashboard.invitation.index', 'uses' => 'DashboardController@getInvitation']);
Route::post('/invitation/{invitation}', ['as' => 'dashboard.invitation.response', 'uses' => 'DashboardController@setInvitation']);

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
});
