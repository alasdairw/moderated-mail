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
    Route::get('/inbox/data', 'InboxController@raw_inbox_data');
    Route::get('email/new', function() {
        $email = \App\Email::fake_new_approved_email();
        return $email;
    });
});


Route::group(['middleware' => ['web','auth']], function () {
    Route::get('/', 'InboxController@index');
    Route::get('/inbox', 'InboxController@index');
    Route::get('/inbox/dummy', 'InboxController@read');
    Route::get('/inbox/message/{message}', 'InboxController@read');
    Route::get('/compose', 'ComposerController@compose');
    Route::get('/drafts', 'ComposerController@index');
    Route::get('/drafts/message/{draft}', 'ComposerController@drafts');
    Route::get('/moderate', 'ModerationController@index');
    Route::get('/moderate/read', 'ModerationController@read');
    Route::post('/moderate/moderate/{message}', 'ModerationController@moderate');
});
