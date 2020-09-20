<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@index')->name('dashboard');

Route::resource('users', 'UserController');
Route::resource('properties', 'PropertyController');
Route::resource('categories', 'CategoryController');
Route::resource('images', 'ImageController');
Route::resource('propertyValues', 'PropertyValueController');
Route::resource('slides', 'SlideController');
Route::resource('pages', 'PageController');
Route::resource('questionCategories', 'QuestionCategoryController');
Route::resource('questionAnswers', 'QuestionAnswerController');
Route::resource('replaces', 'ReplaceController');
Route::resource('subscribers', 'SubscriberController');
Route::resource('comments', 'CommentController');

Route::resource('products', 'ProductController');

Route::get('products/add-images/{product}', 'ProductController@addImagesForm')->name('products.form.add.images');
Route::post('products/add-images/{product}', 'ProductController@addImages')->name('products.form.add.images');

Route::get('products/remove-property/{product}/{property}', 'ProductController@removeProperty')->name('products.remove.property');
Route::get('products/remove-category/{product}/{category}', 'ProductController@removeCategory')->name('products.remove.category');
Route::get('products/remove-image/{product}/{image}', 'ProductController@removeImage')->name('products.remove.image');

