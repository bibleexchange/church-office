<?php namespace App;

class Gift extends \Eloquent {
	
	protected $fillable = [ 'other','penny' , 'nickel' , 'dime' , 'quarter' , 'halfD' , 'oneD' , 'twoD' , 'fiveD' , 'tenD' , 'twentyD' , 'fiftyD' , 'hundredD' , 'seriel' , 'created_at' , 'updated_at' , 'contact_id' , 'memo', 'offering_id' ];
	
	protected $appends = ['giftPennyValue','sums','totalAmount'];
	
	public static $rules = array(
	'other'=> 'Numeric',
	'penny'=> 'Integer', 
	'nickel'=> 'Integer', 
	'dime'=> 'Integer', 
	'quarter'=> 'Integer', 
	'halfD'=> 'Integer', 
	'oneD'=> 'Integer', 
	'twoD'=> 'Integer', 
	'fiveD'=> 'Integer', 
	'tenD'=> 'Integer', 
	'twentyD'=> 'Integer', 
	'fiftyD'=> 'Integer', 
	'hundredD'=> 'Integer', 
	'created_at'=> 'Integer', 
	'updated_at'=> 'Integer', 
	'contact_id'=> 'required|Integer', 
	'memo'=>'',
	'offering_id'=> 'required|Integer', 
	'seriel'=> 'AlphaNum'
    );
	
	public function offering()
	{
	    return $this->belongsTo('App\Offering');
	}
	
	public function contact()
	{
	    return $this->belongsTo('App\Contact');
	}
	
	public function amountOfPennies()
	{
		return $this->penny * .01;
	}
	
	public function amountOfNickels()
	{
		return $this->nickel * .05;
	}
	
	public function amountOfDimes()
	{
		return $this->dime * .10;
	}
	public function amountOfQuarters()
	{
		return $this->quarter * .25;
	}
	public function amountOfHalfDollars()
	{
		return $this->halfD * .50;
	}
	public function amountOfOneDollars()
	{
		return $this->oneD * 1;
	}
	public function amountOfTwoDollars()
	{
		return $this->twoD * 2;
	}
	public function amountOfFiveDollars()
	{
		return $this->fiveD * 5;
	}
	public function amountOfTenDollars()
	{
		return $this->tenD * 10;
	}
	public function amountOfTwentyDollars()
	{
		return $this->twentyD * 20;
	}
	public function amountOfFiftyDollars()
	{
		return $this->fiftyD * 50;
	}
	public function amountOfHundredDollars()
	{
		return $this->hundredD * 100;
	}
	
	public function coinsAmount()
	{
		$pennies = $this->amountOfPennies();
		$nickels = $this->amountOfNickels();
		$dimes = $this->amountOfDimes();
		$quarters = $this->amountOfQuarters();
		$halfDollars = $this->amountOfHalfDollars();
			
		return $pennies + $nickels + $dimes + $quarters + $halfDollars;
			
	}
	
	public function billsAmount()
	{
		$oneDollars = $this->amountOfOneDollars();
		$twoDollars = $this->amountOfTwoDollars();
		$fiveDollars = $this->amountOfFiveDollars();
		$tenDollars = $this->amountOfTenDollars();
		$twentyDollars = $this->amountOfTwentyDollars();
		$fiftyDollars = $this->amountOfFiftyDollars();
		$hundredDollars = $this->amountOfHundredDollars();
	
		return $oneDollars + $twoDollars + $fiveDollars + $tenDollars + $twentyDollars + $fiftyDollars + $hundredDollars;
	}
	
	public function cashAmount()
	{
		return $this->coinsAmount() + $this->billsAmount();
	}
	
	public function getTotalAmountAttribute(){
		return $this->other + $this->cashAmount();
	}
	
	public static function sumOfGifts($gifts)
	{
		$sum = 0;

		foreach($gifts AS $gift){
			$sum = $sum + $gift->totalAmount;
		}
		 
		return $sum;;
	}
	
}