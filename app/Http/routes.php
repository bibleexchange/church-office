<?php

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

View::composer('*', function()
{
	View::share('currentUser', \Auth::user());
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);

Route::model('user', '\App\User');

Route::get('/', ['uses'=>'OfficeController@getIndex','as'=>'home']);
Route::get('/accounting', ['uses'=>'AccountingController@getIndex','as'=>'accounting']);

Route::get('/people', 'PersonsController@index');
Route::get('/people/{id}', 'PersonsController@show');
Route::get('/people/{id}', 'PersonsController@show');
Route::post('/people/date-range', ['uses'=>'PersonsController@range','as'=>'people.date-range']);
Route::get('/people/filter/{filter}', 'PersonsController@index');
Route::get('/people/{id}/attach/{resource}', 'PersonsController@attach');
Route::post('/people/{id}/attach/{resource}', 'PersonsController@postAttach');
Route::post('/people/{id}/attach/{resource}', 'PersonsController@postAttach');

Route::get('/accounting/deposits/{id}/print', 'DepositsController@printMe');
Route::post('/accounting/gifts/{giftId}', ['uses'=>'GiftsController@update','as'=>'update_gift']);

Route::post('/accounting/gifts', 'GiftsController@store');

Route::resource('/office/address', 'AddressController');
Route::resource('/accounting/deposits', 'DepositsController');
Route::resource('/accounting/offerings', 'OfferingsController');

Route::resource('/accounting/transactions', 'TransactionsController');
Route::get('/accounting/{account}', 'TransactionsController@showAccount');
Route::get('/accounting/{account}/reports', 'TransactionsController@getReportsList');
Route::get('/accounting/{account}/reports/daily-balances', 'TransactionsController@getDailyBalances');

Route::resource('/accounting/expenses', 'ExpensesController');
Route::post('/accounting/expenses/{expenseid}', 'ExpensesController@update');

Route::get('/office/mailing', 'AddressController@mailing');
Route::get('/office/missions', 'ContactsController@missions');

Route::Controller('/office', 'OfficeController');