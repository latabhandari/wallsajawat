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
    Route::get('/faq', 'CmsController@faq')->name('faq');

    Route::get('/product/{slug}', 'ProductController@detail')->name('product.detail');

    Route::get('/product/{slug}/{random_id}', 'ProductController@detail')->name('product.detail.rating');

    Route::post('/product/option', 'ProductController@option')->name('product.option');

    Route::post('/product/cart', 'ProductController@cart')->name('product.cart')->middleware(['product.stock']);

    Route::get('/cart', 'ProductController@viewCart')->name('cart');

    Route::get('/cart/delete/{rowId}', 'ProductController@deleteItem')->name('cart.item.delete');

    Route::post('/cart/update', 'ProductController@updateItem')->name('cart.item.update')->middleware('quantity.stock');

    Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('social_login');
    Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social_callback');

    Route::get('/getcities/{state_id}', 'ProductController@getCities')->name('checkout.cities');
    Route::post('/wishlist', 'ProductController@wishlist')->name('product.wishlist');


    Route::get('/wishlist', 'ProfileController@mywishlist')->name('profile.wishlist');

    Route::get('/category/{slug}', 'CategoryController@product')->name('category.product');
    Route::get('/categories', 'CategoryController@categories')->name('categories');


    Route::get('/checkout', 'CheckoutController@checkout')->name('cart.checkout');
    Route::post('/checkout', 'CheckoutController@checkoutStore')->name('cart.checkout.store');
    Route::post('/coupon', 'CheckoutController@coupon')->name('cart.checkout.coupon');

    Route::get('/wishlist/remove/{random_id}', 'CheckoutController@wishlistRemove')->name('wishlist.remove');

    Route::get('/profile', 'ProfileController@profile')->name('profile');
    Route::post('/profile', 'ProfileController@updateProfile')->name('profile.update');

    Route::post('/rating', 'ProfileController@rating')->name('rating');

    Route::get('/orderstore', 'OrderController@store')->name('order.store');
    Route::get('/orders', 'OrderController@order')->name('orders');

    Route::get('/search', 'HomeController@search')->name('search');

    Route::get('/signout', 'HomeController@logout')->name('signout');


    Route::get('/wishlist_cart/{id}', 'ProductController@wishlist_cart')->name('wishlist.cart');
    

});


/*************** Close *****************************/

/************** Admin Url **************************/

Route::group(['namespace' => 'Admin', 'prefix' => 'beta/admin', 'middleware' => ['web']], function() {

		    Route::group(['middleware' => ['auth.admin:admin']], function() {

			Route::get('/dashboard', 'DashboardController@dashboard')->name('admin.dashboard');

            //Route::get('/users', 'UserController@index')->name('admin.users');
            Route::get('/settings', 'SettingsController@index')->name('admin.settings');
            Route::post('/settings', 'SettingsController@store')->name('admin.saved.settings');

            Route::get('/logout', 'DashboardController@logout')->name('admin.logout');
            //Route::get('/ads', 'AdsController@index')->name('admin.ads');

            //Route::get('/user/create', 'UserController@create')->name('admin.user.create');
            //Route::post('/user/store', 'UserController@store')->name('admin.user.store');

            //Route::get('/user/edit/{id}', 'UserController@edit')->name('admin.user.edit');

            //Route::post('/user/update/{id}', 'UserController@update')->name('admin.user.update');

            //Route::get('/user/info/{userid}', 'UserController@info')->name('admin.user.info');

            Route::get('/subscribeUsers', 'DashboardController@subscribes')->name('admin.subscribes');
            Route::delete('/destroy/{id}', 'DashboardController@destroy')->name('admin.subscribes.destroy');

            Route::get('/contact-us-users', 'DashboardController@contactUsUsers')->name('admin.contactus');
            Route::delete('/destroy-contact-us/{id}', 'DashboardController@destroyContactUs')->name('admin.contactus.destroy');

            Route::resource('product', 'ProductController');
            Route::resource('categories', 'CategoryController');

            Route::get('/product/destroyimg/{id}', 'ProductController@destroyimg')->name('admin.product.delete');

            Route::get('/product/status/{id}/{status}', 'ProductController@status')->name('admin.product.status');
            Route::get('/category/status/{id}/{status}', 'CategoryController@status')->name('admin.category.status');

            Route::resource('measurement', 'MeasurementController');

            Route::resource('offers', 'OffersController');

            Route::resource('roles', 'RolesController');

            Route::get('/roles/status/{id}/{status}', 'RolesController@status')->name('admin.roles.status');

            Route::resource('user', 'UserController');

            Route::resource('dimension', 'DimensionController');


            Route::get('/orders', 'OrderController@index')->name('admin.orders');
            Route::post('/orders', 'OrderController@index')->name('admin.orders.filter');
            Route::get('/orders/show/{id}', 'OrderController@show')->name('admin.order.show');

            
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