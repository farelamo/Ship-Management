<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Auth\AuthController@showLogin')->name('login');
Route::post('/', 'Auth\AuthController@login');
Route::get('/register', 'Auth\AuthController@showRegister');
Route::post('/register', 'Auth\AuthController@register');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.index');
    });

    Route::get('noon-report');

    Route::resource('noon-report', 'DeckOps\NoonReportController');
    Route::post('/logout', 'Auth\AuthController@logout');
});
