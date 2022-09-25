<?php

use Illuminate\Support\Facades\Route;


Route::get('/login', 'Auth\AuthController@showLogin')->name('login');
Route::post('/login', 'Auth\AuthController@login');
Route::get('/register', 'Auth\AuthController@showRegister');
Route::post('/register', 'Auth\AuthController@register');

Route::middleware('auth')->group(function () {
    Route::get('/masuk', function () {
        return view('pages.index');
    });
    Route::resource('noon-report', 'DeckOps\NoonReportController');
    Route::post('/logout', 'Auth\AuthController@logout');
});
