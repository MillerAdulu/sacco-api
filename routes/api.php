<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('addressdetails', 'AddressDetailController');

Route::apiResource('businesses', 'BusinessController');
  
Route::apiResource('businessnatures', 'BusinessNatureController');

Route::apiResource('counties', 'CountyController');

Route::apiResource('constituencies', 'ConstituencyController');

Route::apiResource('employers', 'EmployerController');

Route::apiResource('jobtitles', 'JobTitleController');

Route::apiResource('localities', 'LocalityController');

Route::apiResource('maritalstatuses', 'MaritalStatusController');

Route::apiResource('members', 'MemberController');

Route::apiResource('paymentdetails', 'PaymentDetailController');

Route::apiResource('paymentmethods', 'PaymentMethodController');

Route::apiResource('postoffices', 'PostOfficeController');
