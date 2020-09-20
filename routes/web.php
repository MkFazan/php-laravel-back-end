<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function() {

    Auth::routes();

    Route::namespace('Frontend')->group(function () {

        Route::get('/', 'HomeController@pageForSlug')->name('home');

        Route::get('/catalog/{category}', 'HomeController@catalog')->name('catalog');
        Route::get('/categories/{category}', 'HomeController@categories')->name('categories');
        Route::get('/products/{product}', 'HomeController@products')->name('products');

        Route::get('/account', 'AccountController@index')->name('account');

        Route::get('/{slug}', 'HomeController@pageForSlug')->name('get.page.for.slug');
    });

});
