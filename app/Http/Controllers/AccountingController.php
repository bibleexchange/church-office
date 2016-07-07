<?php namespace App\Http\Controllers;

use App\Contact;
use App\Entity;
use App\EntityType;
use App\Expense;
use App\Transaction;
use Auth, Input, Flash;

class AccountingController extends Controller {

public function __construct() {
		$this->middleware('auth');
	}
	
public function getIndex()
	{ 
		$entities = Entity::orderBy('name','ASC')->lists('name','id');

		$recentTransactions = Transaction::recents();

		$cards = [];
		$accounts = EntityType::accounts();
		
		$mostRecentTransaction = Transaction::getTemplate();

		$categories = \App\Category::orderBy('name','ASC')->lists('name','id');
		
		foreach($accounts AS $account)
		{
			array_push($cards, $account->transactionsCard());
		}
		
		$transactions = Transaction::all();
		$colors = ['#f56954','#00a65a','#3c8dbc','#3794fc','#00CD00','#FF7400','#00428b','#FF0000','#009A9A','#f56954','#00a65a','#3c8dbc','#3794fc','#00CD00','#FF7400','#00428b','#FF0000','#009A9A','#3794fc'];
		
		$items = [];
		
		foreach($categories AS $key => $value){

			$items[str_replace(' ','_',$value)] = $transactions->filter(function($e) use( &$key)
			{
				return $e->isCategory($key);
			});
			
		}
		
		return view('accounting.index',[
			'pageTitle'=>'Accounting Main',
			'cards'=>$cards,
			'items'=>$items,
			'categories'=>$categories,
			'colors'=>$colors,
			'entities'=>$entities,
			'mostRecentTransaction'=>$mostRecentTransaction,
			'recentFrom'=>$recentTransactions->from, 
			'recentTo'=>$recentTransactions->to, 
			'recentCat'=>$recentTransactions->category
		]);
	}

}