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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['web']], function() {

		    Route::group(['middleware' => ['auth.admin:admin']], function() {

			Route::get('/dashboard', 'DashboardController@dashboard')->name('admin.dashboard');

            Route::get('/users', 'UserController@index')->name('admin.users');
            Route::get('/settings', 'SettingsController@index')->name('admin.settings');
            Route::post('/settings', 'SettingsController@store')->name('admin.saved.settings');

            Route::get('/logout', 'DashboardController@logout')->name('admin.logout');
            Route::get('/ads', 'AdsController@index')->name('admin.ads');

            Route::get('/user/ads/{userid}', 'UserController@ads')->name('admin.user.ads');

            Route::delete('/user/ad/destroy/{id}', 'UserController@adsdestroy')->name('admin.user.ads.destroy');

            Route::get('/user/favoriteads/{userid}', 'UserController@favoriteads')->name('admin.user.favads');

            Route::get('/user/info/{userid}', 'UserController@info')->name('admin.user.info');

            Route::get('/subscribeUsers', 'DashboardController@subscribes')->name('admin.subscribes');
            Route::delete('/destroy/{id}', 'DashboardController@destroy')->name('admin.subscribes.destroy');

            Route::get('/contact-us-users', 'DashboardController@contactUsUsers')->name('admin.contactus');
            Route::delete('/destroy-contact-us/{id}', 'DashboardController@destroyContactUs')->name('admin.contactus.destroy');

            Route::resource('categories', 'CategoryController');
            Route::resource('state', 'StateController');
            Route::resource('city', 'CityController');
            Route::resource('attribute', 'AttributeController');

   	    });

    	Route::group(['middleware' => ['auth.admin:login']], function() {

    		 Route::get('/', 'AccountController@index')->name('admin.get.login');

    		 Route::post('/login', 'AccountController@login')->name('admin.post.login');

    		 Route::get('/forgot', 'AccountController@forgot')->name('admin.get.forgot');

    		 Route::post('/forgot', 'AccountController@forgotpassword')->name('admin.post.forgot');
        });

});
