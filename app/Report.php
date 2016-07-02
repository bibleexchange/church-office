<?php namespace App;

class Report {
	
	public function __construct($account, $transactions){
		$this->account = $account;
		$this->transactions = $transactions;
		$this->debits = [];
		$this->credits = [];
		$this->creditsSum = 0;
		$this->debitsSum = 0;
		$this->balance = 0;
		
		$this->initialize();

	}
	
	public function initialize()
	  {
		
		foreach($this->transactions AS $trans){
			
			if($trans->from->id == $this->account->id){
				array_push($this->debits,$trans);
				$this->debitsSum = $trans->amount;
			}else{
				array_push($this->credits,$trans);
				$this->creditsSum = $trans->amount;
			}
			
		}
		
		$this->balance = $this->creditsSum - $this->debitsSum;
		
		dd($this);
	  }
	
}