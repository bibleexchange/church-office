<?php namespace App\Core;

trait MoneyTrait {

	public function checks()
	{
		return $this->gifts()->where('gifts.other','>',0)->select(['gifts.other','gifts.seriel','gifts.memo'])->get();
	}
	
	public function checksAmount()
	{
		return $this->gifts->sum('other');
	}
	
	public function countOfPennies()
	{
		return $this->gifts->sum('penny');
	}
	
	public function countOfNickels()
	{
		return $this->gifts->sum('nickel');
	}
	
	public function countOfDimes()
	{
		return $this->gifts->sum('dime');
	}
	public function countOfQuarters()
	{
		return $this->gifts->sum('quarter');
	}
	public function countOfHalfDollars()
	{
		return $this->gifts->sum('halfD');
	}
	public function countOfOneDollars()
	{
		return $this->gifts->sum('oneD');
	}
	public function countOfTwoDollars()
	{
		return $this->gifts->sum('twoD');
	}
	public function countOfFiveDollars()
	{
		return $this->gifts->sum('fiveD');
	}
	public function countOfTenDollars()
	{
		return $this->gifts->sum('tenD');
	}
	public function countOfTwentyDollars()
	{
		return $this->gifts->sum('twentyD');
	}
	public function countOfFiftyDollars()
	{
		return $this->gifts->sum('fiftyD');
	}
	public function countOfHundredDollars()
	{
		return $this->gifts->sum('hundredD');
	}
	
	public function amountOfPennies()
	{
		return $this->countOfPennies() * .01;
	}
	
	public function amountOfNickels()
	{
		return $this->countOfNickels() * .05;
	}
	
	public function amountOfDimes()
	{
		return $this->countOfDimes() * .10;
	}
	public function amountOfQuarters()
	{
		return $this->countOfQuarters() * .25;
	}
	public function amountOfHalfDollars()
	{
		return $this->countOfHalfDollars() * .50;
	}
	public function amountOfOneDollars()
	{
		return $this->countOfOneDollars() * 1;
	}
	public function amountOfTwoDollars()
	{
		return $this->countOfTwoDollars() * 2;
	}
	public function amountOfFiveDollars()
	{
		return $this->countOfFiveDollars() * 5;
	}
	public function amountOfTenDollars()
	{
		return $this->countOfTenDollars() * 10;
	}
	public function amountOfTwentyDollars()
	{
		return $this->countOfTwentyDollars() * 20;
	}
	public function amountOfFiftyDollars()
	{
		return $this->countOfFiftyDollars() * 50;
	}
	public function amountOfHundredDollars()
	{
		return $this->countOfHundredDollars() * 100;
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
	
	public function totalAmount(){
		return $this->checksAmount() + $this->cashAmount();
	}

}