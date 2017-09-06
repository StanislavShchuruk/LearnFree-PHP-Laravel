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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/my_courses', 'CourseController@myCourses');
Route::get('/course/{id}', 'CourseController@course');

Route::get('/my_profile', 'ProfileController@myProfile');
Route::post('/my_profile/update', 'ProfileController@updateProfile')->name('updateProfile');

Route::get('/countries', 'ProfileController@getCountriesJSON');
Route::get('/regions', 'ProfileController@getRegionsJSON');
Route::get('/cities', 'ProfileController@getCitiesJSON');

