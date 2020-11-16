<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::get('blog','APIController@Blog');
Route::get('blog/{id}','APIController@BlogById');
Route::post('blog','APIController@BlogSave');
Route::put('blog/{id}','APIController@BlogUpdate');
Route::delete('blog/{id}','APIController@BlogDelete');
Route::get('user','APIController@User');
Route::get('user/{id}','APIController@UserById');
Route::post('user','APIController@UserSave');
Route::put('user/{id}','APIController@UserUpdate');
Route::delete('user/{id}','APIController@UserDelete');
