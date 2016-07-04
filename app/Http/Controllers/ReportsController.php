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

class ReportsController extends OfficeController {

 public function index()
    {
		$reports = Report::all();

        return view('accounting.reports.index',compact('reports'));
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
		$entry->url = $transaction->url();
		
		array_push($entries,$entry);
		
	}
		$register_balance = number_format($register_balance,2);
	
        return view('accounting.transactions.daily',compact('entity','entries','register_balance'));
    }
	
}
