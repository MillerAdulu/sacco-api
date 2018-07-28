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

Route::apiResources([

  'addressdetails' => 'AddressDetailController',
  'businesses' => 'BusinessController',
  'businessnatures' => 'BusinessNatureController',
  'counties' => 'CountyController',
  'constituencies' => 'ConstituencyController',
  'employers' => 'EmployerController',
  'jobtitles' => 'JobTitleController',
  'localities' => 'LocalityController',
  'maritalstatuses' => 'MaritalStatusController',
  'members' => 'MemberController',
  'paymentdetails' => 'PaymentDetailController',
  'paymentmethods' => 'PaymentMethodController',
  'postoffices' => 'PostOfficeController'

]);