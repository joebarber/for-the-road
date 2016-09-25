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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/now-playing/', function () {
    return view('now-playing');
});

Route::get('/up-next/', function () {
    return view('up-next');
});

Route::get('/promo-1/', function () {
    return view('promo-1');
});

Route::get('/promo-2/', function () {
    return view('promo-2');
});

Route::get('/event-messages/', function () {
    return view('event-messages');
});