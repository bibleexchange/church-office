<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Multiplier {
	
	function __construct(){
		$this->penny = 0.01;
		$this->nickel = 0.05;
		$this->dime = 0.10;
		$this->quarter = 0.25;
		$this->halfD = 0.50;
		$this->oneD = 1.00;
		$this->twoD = 2.00;
		$this->fiveD = 5.00;
		$this->tenD = 10.00;
		$this->twentyD = 20.00;
		$this->fiftyD = 50.00;
		$this->hundredD = 100.00;
		$this->checks = 1;
	}
	
}

class TransactionDetail extends Model {
	
	protected $table = 'transaction_details';
	public $timestamps = true;
	protected $fillable = [ "penny","nickel","dime","quarter","halfD","oneD","twoD","fiveD","tenD","twentyD","fiftyD","hundredD","checks","checks_sum"];
	
	 public $penny = 0; 
	 public $nickel = 0; 
	 public $dime = 0; 
	 public $quarter = 0; 
	 public $halfD = 0; 
	 public $oneD = 0; 
	 public $twoD = 0; 
	 public $fiveD = 0; 
	 public $tenD = 0; 
	 public $twentyD = 0; 
	 public $fiftyD = 0; 
	 public $hundredD = 0; 
	 public $checks = 0;
	
	public function transaction()
	{
	    return $this->belongsTo('App\Transaction','transaction_id');
	}
	
	public function value($column)
	{		
		$multiplier = new Multiplier;
		return number_format($this->$column * $multiplier->$column,2);	
	}
	
	public function cash(){
		
		$amount = 0;
		$use = ["oneD","twoD","fiveD","tenD","twentyD","fiftyD","hundredD"];
		$multiplier = new Multiplier;
		$t= $this;
		
		foreach($this->fillable AS $column){
			
			if(in_array($column, $use)){
				$amount = $amount + ($multiplier->$column * $t->$column);
			}
			
		}

		return $amount;
	}
	
	public function coins(){

		$amount = 0;
		$use = ["penny","nickel","dime","quarter","halfD"];
		$multiplier = new Multiplier;
		$t= $this;
		
		foreach($this->fillable AS $column){
			
			if(in_array($column, $use)){
				$amount = $amount + ($multiplier->$column * $t->$column);
			}
			
		}

		return $amount;
	}
	
}
