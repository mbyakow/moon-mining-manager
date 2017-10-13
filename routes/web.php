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

// Master route.
Route::get('/', 'AppController@home');

// Access management.
Route::get('/access', 'AppController@showAuthorisedUsers');
Route::get('/access/new', 'AppController@showUserAccessHistory');
Route::post('/access/whitelist/{id}', 'AppController@whitelistUser');
Route::post('/access/blacklist/{id}', 'AppController@blacklistUser');

// Handle EVE SSO requests and callbacks.
Route::get('/login', 'Auth\AuthController@redirectToProvider');
Route::get('/callback', 'Auth\AuthController@handleProviderCallback');

// Logout.
Route::get('/logout', 'AppController@logout');

// Cron routes.
Route::get('/cron/refresh', 'CronController@refresh');
Route::get('/cron/test', 'CronController@pollRefineries');