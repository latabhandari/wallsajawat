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
    //return view('welcome');
    echo '<h1>Coming Soon!</h1>';
    die();
});



//Route::get('/home', 'HomeController@index')->name('home');

//Email Verification
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');

/************** Frontend Url ******************/

Route::group(['prefix' => 'beta'], function() {

    Auth::routes();

    Route::get('/', 'HomeController@index')->name('home.index');

    Route::get('/about', 'CmsController@about')->name('about');
    Route::get('/contact', 'CmsController@contact')->name('contact');
    Route::post('/contact', 'CmsController@contactpost')->name('contactpost');
    Route::get('/terms', 'CmsController@terms')->name('terms');
    Route::get('/policy', 'CmsController@policy')->name('policy');
    Route::get('/our-range', 'CmsController@range')->name('range');
    Route::get('/wallpaper-installer', 'CmsController@installer')->name('wallpaper_installer');
    Route::get('/how-to-measure', 'CmsController@measure')->name('how_to_measure');
    Route::get('/offers', 'CmsController@offers')->name('offers');

    Route::get('/product/{slug}', 'ProductController@detail')->name('product.detail');

    Route::post('/product/option', 'ProductController@option')->name('product.option');
    Route::post('/product/cart', 'ProductController@cart')->name('product.cart');
    Route::get('/cart', 'ProductController@viewCart')->name('cart');
    Route::get('/cart/delete/{rowId}', 'ProductController@deleteItem')->name('cart.item.delete');
    Route::post('/cart/update', 'ProductController@updateItem')->name('cart.item.update');

    Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('social_login');
    Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social_callback');;

});


/*************** Close *****************************/

/************** Admin Url **************************/

Route::group(['namespace' => 'Admin', 'prefix' => 'beta/admin', 'middleware' => ['web']], function() {

		    Route::group(['middleware' => ['auth.admin:admin']], function() {

			Route::get('/dashboard', 'DashboardController@dashboard')->name('admin.dashboard');

            Route::get('/users', 'UserController@index')->name('admin.users');
            Route::get('/settings', 'SettingsController@index')->name('admin.settings');
            Route::post('/settings', 'SettingsController@store')->name('admin.saved.settings');

            Route::get('/logout', 'DashboardController@logout')->name('admin.logout');
            //Route::get('/ads', 'AdsController@index')->name('admin.ads');

            Route::get('/user/create', 'UserController@create')->name('admin.user.create');
            Route::post('/user/store', 'UserController@store')->name('admin.user.store');

            Route::get('/user/edit', 'UserController@edit')->name('admin.user.edit');

            Route::post('/user/update', 'UserController@store')->name('admin.user.update');

            Route::get('/user/info/{userid}', 'UserController@info')->name('admin.user.info');

            Route::get('/subscribeUsers', 'DashboardController@subscribes')->name('admin.subscribes');
            Route::delete('/destroy/{id}', 'DashboardController@destroy')->name('admin.subscribes.destroy');

            Route::get('/contact-us-users', 'DashboardController@contactUsUsers')->name('admin.contactus');
            Route::delete('/destroy-contact-us/{id}', 'DashboardController@destroyContactUs')->name('admin.contactus.destroy');

            Route::resource('product', 'ProductController');
            Route::resource('categories', 'CategoryController');

            Route::get('/product/destroyimg/{id}', 'ProductController@destroyimg')->name('admin.product.delete');

            Route::resource('measurement', 'MeasurementController');

            Route::resource('offers', 'OffersController');

            Route::resource('roles', 'RolesController');
            
            //Route::resource('city', 'CityController');

            //Route::resource('attribute', 'AttributeController');

   	    });

    	Route::group(['middleware' => ['auth.admin:login']], function() {

    		 Route::get('/', 'AccountController@index')->name('admin.get.login');

    		 Route::post('/login', 'AccountController@login')->name('admin.post.login');

    		 Route::get('/forgot', 'AccountController@forgot')->name('admin.get.forgot');

    		 Route::post('/forgot', 'AccountController@forgotpassword')->name('admin.post.forgot');
        });
        
});

/************** Close Admin Url ******************/