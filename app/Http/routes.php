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

/**
 * Search files routes
 * ---------------------------------------------------------------------------------------------------------------------/
 */
Route::get('search', ['as' => 'search', 'uses' => 'SearchController@search']);