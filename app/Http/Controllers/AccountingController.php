<?php namespace App\Http\Controllers;

use App\Contact;
use App\EntityType;
use App\Expense;
use App\Transaction;
use Auth, Input, Flash;

class AccountingController extends Controller {

public function __construct() {
	
	$this->middleware('auth');
	
	$this->contact = new \App\Contact;
	$this->account = new \App\Account;
	$this->deposit = new \App\Deposit;
	$this->offering = new \App\Offering;
	$this->gift = new \App\Gift;
	
	$this->deposits = $this->deposit->orderBy('deposited','DESC')->limit(25)->get();
	
}
public function getIndex()
	{ 
		
		$cards = [];
		$accounts = EntityType::accounts();
		
		$categories = \App\Category::lists('name','id');
		
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
			'colors'=>$colors
		]);
	}

	public function getIndexOld()
	{
		
		$deposits = $this->deposit->get();
		$inAmount = 0;
		$outAmount = 0;
		
		foreach($deposits AS $deposit){
			$inAmount = $inAmount + $deposit->totalAmount();
		}
		
		$expenses = Expense::all();
		
		foreach($expenses AS $expense){
			$outAmount = $outAmount + $expense->amount;
		}
		
		$difference = number_format($inAmount-$outAmount);
		
		$deposits = new Card('Deposits',$this->deposit->count(),'','/accounting/deposits','ion ion-stats-bars',[],1); 
		$expenses = new Card('Expenses','$ '. $difference ,'','/accounting/expenses','ion ion-bag',[],2); 
		
		$cards = [$deposits, $expenses];
		
		return view('accounting.index',[
			'pageTitle'=>'Accounting Main',
			'cards'=>$cards
		]);
	}
	
	public function getPrint()
	{

		return view(
			'office.print',[
			'pageTitle'=>'print',
			'deposits'=>$this->deposit->selectList(),
			'offerings'=>$this->offering->selectList(20),
			]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		return view(
			'office.users.remind',[
			'pageTitle'=>'Register'
			]);
	}
/*

 <h1>
	Balance : $ {!! number_format($transactions->sum('amount')) !!}
	<small>({!!$transactions->first()->date!!} to {!!$transactions->last()->date!!})</small>
</h1>

<ol class="breadcrumb">
   <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/accounting"><i class="fa fa-money"></i> Accounting</a></li>
   <li class="active">Transactions</li>
</ol>

*/
}