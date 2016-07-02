<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Expense;
use App\Entity;
use App\Report;
use App\Transaction;
use App\Libraries\Helpers;
use Input, Redirect;

class TransactionsController extends OfficeController {

 public function index()
    {
		$entities = Entity::orderBy('name','ASC')->get();
		$transactions = Transaction::orderBy('date','DESC')->paginate(10);
		$categories = \App\Category::lists('name','id');

        return view('accounting.transactions.index',compact('transactions','categories','entities'));
    }

	public function update($id)
	{
		$input = Input::all();
// + last_edit_by_id from Auth::user()->id
		$expense = Expense::find($input['expense_id']);
		
		$ignore_these = ["_token","expense_id"];
		
		foreach($input AS $key=>$value){
			if(!in_array($key, $ignore_these)){
				$expense[$key] = $value;
			}
		}
		$expense->save();
		
		return Redirect::back();
	}
 
	public function showAccount($entity_string)
    {
		$entities = Entity::orderBy('name','ASC')->lists('name','id');
		$entity_id = explode('_',$entity_string)[0];
		
		$entity = Entity::find($entity_id);		
		$transactions = $entity->transactions();
		$categories = \App\Category::lists('name','id');

		$colors = ['#f56954','#00a65a','#3c8dbc','#3794fc','#00CD00','#FF7400','#00428b','#FF0000','#009A9A','#f56954','#00a65a','#3c8dbc','#3794fc','#00CD00','#FF7400','#00428b','#FF0000','#009A9A','#3794fc'];
		
		$items = [];
		
		$items['credits'] = $entity->credits;
		$items['debits'] = $entity->debits;
		
		foreach($categories AS $key => $value){

			$items[str_replace(' ','_',$value)] = $entity->debits->filter(function($e) use( &$key)
			{
				return $e->isCategory($key);
			});
			
		}
		
        return view('accounting.transactions.show',compact('categories','entities','entity','items','transactions','colors'));
    }
	
	public function getReportsList($entity_string)
    {
		$entity_id = explode('_',$entity_string)[0];
		$entity = Entity::find($entity_id);		
		$reports = new Report($entity,$entity->transactionsAll());
		
		return view('accounting.transactions.show',compact('categories','entities','entity','items','transactions','colors'));
    }
	
	public function getDailyBalances($entity_string)
    {
		$entity_id = explode('_',$entity_string)[0];
		$entity = Entity::find($entity_id);		
		$transactions = $entity->transactionsAll();
	
		$entries = [];
		$register_balance = 0.00;
		
	foreach($entity->transactionsAll() AS $transaction)
	{
		if($transaction->from_entity_id == $entity->id){
			$register_balance = $register_balance - $transaction->amount;
		}else{
			$register_balance = $register_balance + $transaction->amount;
		}		
		
		$entry = new \stdClass();
		$entry->date = $transaction->date;
		$entry->amount = number_format($transaction->amount,2);
		$entry->category = $transaction->category->name;
		$entry->from = $transaction->from->name;
		$entry->to = $transaction->to->name;
		$entry->balance = number_format($register_balance,2);
		
		array_push($entries,$entry);
		
	}
		$register_balance = number_format($register_balance,2);
	
        return view('accounting.transactions.daily',compact('entity','entries','register_balance'));
    }
	
	
}
