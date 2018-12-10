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
  
  Route::prefix('saccoapp')->group(function() {
    Route::post('/register', 'RegisterUserController@register');
    Route::post('/login', 'LoginUserController@login');
    Route::post('/checkusername', 'LoginUserController@checkusername');
    Route::post('/adddeposit', 'MemberDepositController@addMpesaDeposit');
    Route::post('/stkdeposit', 'MemberDepositController@stkMpesaDeposit');
  });

  Auth::routes();

  Route::get('/home', 'HomeController@index')->name('home');
