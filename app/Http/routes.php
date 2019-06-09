<?php
/*
$jess = new App\User;
$jess->email = 'jlcarle7@gmail.com';
$jess->setPassword('jeremiah7');
$jess->save();
*/

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
Route::get('/people/create', 'PersonsController@create');
Route::post('/people/create', 'PersonsController@store');
Route::get('/people/{id}', 'PersonsController@show');
Route::get('/people/{id}/edit', 'PersonsController@edit');

Route::post('/people/date-range', ['uses'=>'PersonsController@range','as'=>'people.date-range']);
Route::get('/people/filter/{filter}', 'PersonsController@index');
Route::get('/people/{id}/attach/{resource}', 'PersonsController@attach');
Route::post('/people/{id}/attach/{resource}', 'PersonsController@postAttach');
Route::post('/people/{id}/attach/{resource}', 'PersonsController@postAttach');

Route::get('/accounting/deposits/{id}/print', 'DepositsController@printMe');
Route::post('/accounting/gifts/{giftId}', ['uses'=>'GiftsController@update','as'=>'update_gift']);

Route::post('/accounting/gifts', 'GiftsController@store');

Route::resource('/address', 'AddressController');
Route::resource('/accounting/deposits', 'DepositsController');
Route::resource('/accounting/offerings', 'OfferingsController');

Route::resource('/accounting/transactions', 'TransactionsController');
Route::post('/accounting/transactions/{transaction}/details', 'TransactionsController@updateDetails');

Route::get('/accounting/reports', 'ReportsController@index');
Route::get('/accounting/reports/daily-balances/{account}', 'ReportsController@getDailyBalances');
Route::get('/accounting/reports/entity-transactions', 'ReportsController@getEntityTransactionsIndex');
Route::get('/accounting/reports/entity-transactions/{entity}', 'ReportsController@getEntityTransactions');


Route::get('/accounting/{account}', 'TransactionsController@showAccount');

Route::resource('/accounting/expenses', 'ExpensesController');
Route::post('/accounting/expenses/{expenseid}', 'ExpensesController@update');

Route::get('/office/mailing', 'AddressController@mailing');
Route::get('/office/missions', 'ContactsController@missions');

Route::Controller('/office', 'OfficeController');