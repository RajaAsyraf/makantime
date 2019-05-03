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
    Route::get('/group', ['as' => 'group.index', 'uses' => 'GroupController@index']);
    Route::get('/group/create', ['as' => 'group.create', 'uses' => 'GroupController@create']);
    Route::post('/group/store', ['as' => 'group.store', 'uses' => 'GroupController@store']);
    Route::get('/group/{group}', ['as' => 'group.view', 'uses' => 'GroupController@view']);
    Route::get('/create/invitation', ['as' => 'invitation.create', 'uses' => 'InvitationController@create']);
    Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
});
