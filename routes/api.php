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
  'postoffices' => 'PostOfficeController',
  'nominees' => 'NomineeController',
  'relationships' => 'RelationshipController',
  'membercontributions' => 'MemberContributionController'

]);

Route::prefix('addressdetails')->group(function () {
  Route::get('/members/{member}', 'AddressDetailController@member_addresses');
  Route::get('/businesses/{business}', 'AddressDetailController@business_addresses');
  Route::get('/employers/{employer}', 'AddressDetailController@employer_addresses');
});

Route::prefix('constituencies')->group(function () {
  Route::get('/county/{county}', 'ConstituencyController@countyConstituencies');
});

Route::prefix('localities')->group(function () {
  Route::get('/constituency/{constituency}', 'LocalityController@constituencyLocalities');
});

Route::prefix('paymentdetails')->group(function () {
  Route::get('/members/{member}', 'PaymentDetailController@memberPaymentDetails');
});

Route::prefix('nominees')->group(function() {
  Route::get('/members/{member}', 'NomineeController@memberNominees');
});

Route::prefix('membercontributions')->group(function() {
  Route::get('/members/{member}', 'MemberContributionController@memberContributions');
});