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

Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/invitation', ['as' => 'invitation.show', 'uses' => 'InvitationController@show']);
    Route::post('/invitation/response/{invitation}', ['as' => 'invitation.storeResponse', 'uses' => 'InvitationController@storeResponse']);
    Route::get('/invitation/create', ['as' => 'invitation.create', 'uses' => 'InvitationController@create']);
    Route::get('/group', ['as' => 'group.index', 'uses' => 'GroupController@index']);
    Route::get('/group/create', ['as' => 'group.create', 'uses' => 'GroupController@create']);
    Route::post('/group/store', ['as' => 'group.store', 'uses' => 'GroupController@store']);
    Route::get('/group/{group}', ['as' => 'group.show', 'uses' => 'GroupController@show']);
    Route::get('group/{group}/restaurant/create', ['as' => 'group.restaurant.create', 'uses' => 'GroupController@createGroupRestaurant']);
    Route::post('group/{group}/restaurant/store', ['as' => 'group.restaurant.store', 'uses' => 'GroupController@storeGroupRestaurant']);
    // TODO: Create middleware to check only for admin group can proceed with this routes
    Route::post('/invitation/store', ['as' => 'invitation.store', 'uses' => 'InvitationController@store']);
    Route::get('/group/{group}/invite', ['as' => 'group.invite', 'uses' => 'GroupController@invite']);
    Route::post('/group/{group}/invite/store', ['as' => 'group.invite.store', 'uses' => 'GroupController@storeInvitation']);
});
