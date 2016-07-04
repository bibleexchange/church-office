<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Expense;
use App\Entity;
use App\Report;
use App\Transaction;
use App\TransactionDetail;
use App\Libraries\Helpers;
use Input, Redirect;
use Auth;

class TransactionsController extends OfficeController {

 public function index()
    {
		$entities = Entity::orderBy('name','ASC')->lists('name','id');
		$transactions = Transaction::orderBy('date','DESC')->paginate(10);
		$categories = \App\Category::lists('name','id');

        return view('accounting.transactions.index',compact('transactions','categories','entities'));
    }

	 public function show($transaction_id)
    {
		$transaction = Transaction::find($transaction_id);

		if ($transaction->details->count() === 0){
			$details = new TransactionDetail;
		}else{
			$details = $transaction->details->first();
		}
		
        return view('accounting.transactions.show-transaction',compact('transaction','details'));
    }
	
	public function update($id)
	{
		$input = Input::all();

		$transaction = Transaction::find($input['transaction_id']);
		
		$ignore_these = ["_token","transaction_id","_method"];
		
		foreach($input AS $key=>$value){
			if(!in_array($key, $ignore_these)){
				$transaction[$key] = $value;
			}
		}
		
		$transaction->last_edit_by = Auth::user()->id;
		
		$transaction->save();
		
		return Redirect::back();
	}
 
 public function updateDetails($id)
	{
		$input = Input::all();
		$details = TransactionDetail::where('transaction_id',$id)->first();
		
		if($details === null){
			$details = new TransactionDetail;
			$details->transaction_id = $id;
		}

		$ignore_these = ["_token","transaction_id","_method"];

		foreach($input AS $key=>$value){
			if(!in_array($key, $ignore_these)){
				$details[$key] = $value;
			}
		}
		dd($details);
		$details->save();
		
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
	
	public function store()
	{
			$transaction = new Transaction;  
			
			$transaction->amount = Input::get('amount');		
			$transaction->from_entity_id = Input::get('from_entity_id');
			$transaction->to_entity_id = Input::get('to_entity_id');
			$transaction->category_id = Input::get('category_id');
			$transaction->date = Input::get('date');
			$transaction->memo = Input::get('memo');
			$transaction->seriel = Input::get('seriel');
			$transaction->last_edit_by_id = Auth::user()->id;
			$transaction->save();
		 
			return Redirect::back()->with('message', 'Transaction successfully created!');

	}
	
	public function destroy()
	{
			$transaction = Transaction::find(Input::get('transaction_id'));  
			$transaction->delete();
		 
			return Redirect::back()->with('message', 'Transaction successfully deleted!');

	}
	
}
