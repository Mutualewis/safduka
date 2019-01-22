<?php

/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::post('loginapi', 'Auth\LoginController@login')->name('loginapi');

Route::group(['prefix' => 'api/v1', 'namespace' => 'Api\V1', 'middleware' => ['auth:api'], 'as' => 'api.'], function () {
			

            Route::post('change-password', 'ChangePasswordController@changePassword')->name('auth.change_password');
            
            Route::get('millinglinstructionslist', 'ProcessResultsController@listMillingInstructions')->name('millinglinstructionslist.list');

            Route::get('outturnlist/{id}', 'ProcessResultsController@listMillingInstructionOutturns')->name('outturnlist.list');

            Route::get('gradeslist', 'ProcessResultsController@listGrades')->name('grades.list');

            Route::get('resultslist/{id}', 'ProcessResultsController@resultslist')->name('resultlist.list');
        
            Route::get('user-actions', 'UserActionsController@index')->name('user-actions.index');

            Route::post('postresult', 'ProcessResultsController@saveResults')->name('result.save');
        });