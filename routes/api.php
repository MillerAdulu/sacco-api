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
    'memberdeposits' => 'MemberDepositController'
  
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
  
  Route::prefix('memberdeposits')->group(function() {
    Route::get('/members/{member}', 'MemberDepositController@memberDeposits');
    Route::get('/members/accounts/all', 'MemberDepositController@allAccounts');
    Route::post('/account/lipanampesa', 'MemberDepositController@lipaNaMpesa');
  });
  
  Route::prefix('/loans')->group(function() {
    Route::apiResources([
      'types' => 'LoanTypeController',
      'repaymentstatuses' => 'LoanRepaymentStatusController',
      'issuingstatuses' => 'LoanIssuingStatusController',
      'guarantors' => 'LoanGuarantorController',
      'memberloans' => 'MemberLoanController'
    ]);
    
    Route::get('member/{member}', 'MemberLoanController@memberLoans');
    Route::get('loan/{loan}', 'LoanGuarantorController@loanGuarantors');
  });
  
  Route::prefix('/dashboard')->group(function() {
    Route::get('/members', 'DashboardController@members');
    Route::get('/deposits', 'DashboardController@deposits');
    Route::get('/memberloans', 'DashboardController@memberLoans');
  });
  
  Route::prefix('/members')->group(function() {
    Route::post('/accounts/register/{member}', 'MemberController@registerAccount');
    Route::post('/accounts/reset/{member}', 'MemberController@resetPassword');
    Route::post('/account/uploadpassportphoto', 'MemberController@uploadPassportPhoto');
  });