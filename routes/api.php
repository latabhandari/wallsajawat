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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::post('countries', 'API\UserController@countries');
Route::post('states', 'API\UserController@states');
Route::post('cities', 'API\UserController@cities');
Route::post('products', 'API\UserController@products');
Route::get('categories', 'API\UserController@categories');
Route::post('subcategories', 'API\UserController@subcategories');
Route::get('products', 'API\UserController@products');//
Route::post('forgot_password', 'API\ForgotPasswordController@forget');
Route::post('social_register', 'API\UserController@social_register');
Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'API\UserController@details');
Route::post('edit_profile', 'API\UserController@edit_profile');
Route::post('change_password', 'API\UserController@change_password');



});

Route::get('search', 'API\UserController@search');

?>