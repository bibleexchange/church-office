<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OfficeController;
use App\Deposit;
use App\Contact;
use App\Card;
use Input, Flash,Redirect;
use Illuminate\Http\Request;

class DepositsController extends OfficeController {

	public function index()
	{
		$cards = [];
		
		
		foreach($this->deposits as $deposit){
			$links = [];
			
			foreach ($deposit->offerings AS $offering){
				$link = new \stdClass();
				$link->title = $offering->name;
				$link->url = "/accounting/offerings/".$offering->id;
				
				array_push($links, $link);
			} 

			$card = new Card($deposit->account->title . " | " . $deposit->deposited, '$ '.$deposit->totalAmount(),'','/accounting/deposits/' . $deposit->id,'ion ion-stats-bars', $links, 2); 
			
			array_push($cards,$card);
/*

*/
	  }
		
		return view(
			'accounting.deposits.index',[
			'pageTitle'=>'Input',
			'accountsSelectList'=> $this->account->selectList(),
			'depositedCurrentDate' => date('Y-m-d'),
			'deposits'=> $this->deposits,
			'cards'=>$cards
			]);
	}

	public function store()
	{
			$entry = new Deposit;
			$entry->deposited = Input::get('deposited');		
			$entry->account_id = Input::get('account_id');
			$entry->memo = Input::get('memo');
			$entry->save();
		 	
			Flash::message('Deposit successfully started!');
			
			return Redirect::to('accounting/deposits/'.$entry->id)->with('message', 'Deposit Successfully created!');

	}

	public function show($id)
	{
		$deposits = $this->deposits;
		$deposit = Deposit::find($id);
		$givers = Contact::orderBy('lastname', 'ASC')->get();

		return view('accounting.deposits.show',compact('deposit','deposits','givers'));
	}
	
	public function printMe($id)
	{
		$deposit = Deposit::find($id);
		return view('accounting.deposits.print',compact('deposit'));
	}

}
