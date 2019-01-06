<?php

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();


/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/

Route::group(['prefix' => ADMIN, 'as' => ADMIN . '.','namespace'=>'Admin'],function () {
    Route::middleware(['auth:admin'])->group(function (){
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::resource('users', 'UserController');
    });
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login')->name('login.submit');
    Route::post('/logout', 'LoginController@logout')->name('ogout.submit');
});

Route::get('/', function () {
    return view('welcome');
});
