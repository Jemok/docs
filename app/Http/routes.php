<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Application set up routes
 * --------------------------------------------------------------------------------------------------------------------*/
Route::get('/', function() {

    if(\Auth::guest()){
        return view('welcome');
    }

    return redirect('/home');
});

/**
 * Authentication routes
 ----------------------------------------------------------------------------------------------------------------------*/
Route::auth();

/**
 * Dashboard routes
 * --------------------------------------------------------------------------------------------------------------------*/
Route::get('/home', 'HomeController@index');

/**
 * Lecturer registration routes
 * ------------------------------------------------------------------------------------------------------------------**/

Route::get('/register/lecturer', ['as' => 'createLecturer', 'uses' => 'Auth\AuthController@getLecturerRegistrationForm']);
Route::post('/register/lecturer', ['as' => 'storeLecturer', 'uses' => 'Auth\AuthController@register']);

/**
 * User School Details routes
 -----------------------------------------------------------------------------------------------------------------------*/
Route::post('/user/schools', ['as' => 'storeUserSchoolDetails', 'uses' => 'UserSchoolDetailsController@store']);

/**
 * File routes
 * ---------------------------------------------------------------------------------------------------------------------/
 */
Route::post('files', ['as' => 'storeFile', 'uses' => 'FilesController@store']);
Route::post('files/{receiver}', ['as' => 'shareFileToUser', 'uses' => 'FilesController@shareToUser']);
Route::post('files/lecturer/{group_id}', ['as' => 'lecturerShare', 'uses' => 'FilesController@storeForLec']);



/**
 * Search files routes
 * ---------------------------------------------------------------------------------------------------------------------/
 */
Route::get('search', ['as' => 'search', 'uses' => 'SearchController@search']);
Route::get('search/lecturer', ['as' => 'searchGroup', 'uses' => 'SearchController@searchGroup']);

/**
 * Group Routes
 * ---------------------------------------------------------------------------------------------------------------------/
 */
Route::get('members', ['as' => 'allMembers', 'uses' => 'GroupController@getMembers']);

Route::get('show/{group_id}/{group_name}/{group_code}', ['as' => 'showGroup', 'uses' => 'GroupController@showGroup']);

/**
 * Lecturer Favorites route
 * ---------------------------------------------------------------------------------------------------------------------/
 */

Route::post('lecturer/favorite/{group_id}', ['as' => 'lecturerFavorite', 'uses' => 'GroupController@addLecturerFavorite']);