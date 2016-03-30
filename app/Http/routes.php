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



Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::post('/inbound', 'InboundController@recieve');
});


Route::group(['middleware' => ['web','auth']], function () {
    Route::get('/', 'InboxController@index');
    Route::get('/inbox', 'InboxController@index');
    Route::get('/inbox/message/{emails}', 'InboxController@read');
    Route::get('/compose', 'ComposerController@compose');
    Route::get('/drafts', 'ComposerController@index');
    Route::get('/drafts/message/{drafts}', 'ComposerController@drafts');
    Route::get('/moderate', 'ModerationController@index');
    Route::get('/moderate/read', 'ModerationController@read');
    Route::post('/moderate/moderate/{emails}', 'ModerationController@moderate');
});
