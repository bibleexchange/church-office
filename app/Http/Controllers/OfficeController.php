<?php namespace App\Http\Controllers;

use App\Contact;
use App\Card;
use Auth, Input, Flash;

class OfficeController extends Controller {

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
		return $this->getDashboard();
	}
	
	public function getPrint()
	{

		return view(
			'accounting.print',[
			'pageTitle'=>'print',
			'deposits'=>$this->deposit->selectList(),
			'offerings'=>$this->offering->selectList(20),
			]);
	}
		
	public function getDashboard() {
		
		$user = Auth::user();
		$people = new \stdClass();
		$people->count = Contact::all()->count();
		
		$lastDeposit = $this->deposit->orderBy('deposited','DESC')->first();

		$accounting = new Card('Accounting','$ '.$lastDeposit->totalAmount(),'','/accounting','ion ion-bag',[],2); 
		$peoples = new Card('People',$people->count,'','/people','ion ion-person-add',[],3); 
		
		$cards = [$accounting,$peoples];
		
		return view('dashboard',[
			'pageTitle'=>'Dashboard',
			'inout_title' => 'Log Out',
			'inout_url' => 'logout',
			'people'=>$people,
			'cards'=>$cards
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

}
