<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {

        Route::get('lang/change', 'LocalizationController@change')->name('changeLang');
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * User Routes
         */
        Route::group(['prefix' => 'Company'], function() {
            //............ company........... //
               Route::get('/', 'CompanyController@index')->name('company.index');
            Route::get('/create', 'CompanyController@create')->name('company.create');
             Route::post('/store', 'CompanyController@store')->name('company.store');
             Route::get('/{company}/edit', 'CompanyController@edit')->name('company.edit');
                 Route::patch('/{company}/update', 'CompanyController@update')->name('company.update');
            Route::delete('/{company}/delete', 'CompanyController@destroy')->name('company.destroy');
        });
        Route::group(['prefix' => 'employee'], function() {
            //............ company........... //
               Route::get('/', 'EmployeeController@index')->name('employee.index');
            Route::get('/create', 'EmployeeController@create')->name('employee.create');
             Route::post('/store', 'EmployeeController@store')->name('employee.store');
             Route::get('/{employee}/edit', 'EmployeeController@edit')->name('employee.edit');
                 Route::patch('/{employee}/update', 'EmployeeController@update')->name('employee.update');
            Route::delete('/{employee}/delete', 'EmployeeController@destroy')->name('employee.destroy');
        });
    });
});
