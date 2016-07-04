<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
	
	protected $table = 'transactions';
	public $timestamps = true;
	protected $fillable = [ 'amount','from_entity_id','to_entity_id', 'category_id','date','memo','seriel','last_edit_by_id'];
	
	public function details()
	{
	    return $this->hasMany('App\TransactionDetail','transaction_id');
	}
	
	public function from()
	{
	    return $this->belongsTo('App\Entity','from_entity_id');
	}
	
	public function to()
	{
	    return $this->belongsTo('App\Entity','to_entity_id');
	}
	
	public function url()
	{
	    return "/accounting/transactions/" . $this->id;
	}
	
	public function category()
	{
	    return $this->belongsTo('App\Category','category_id');
	}
	
	public function lastEditBy()
	{
	    return $this->belongsTo('App\Entity','last_edit_by_id');
	}
	
	public function isCategory($catId)
	{
	    
		if($this->category_id === $catId){
			return true;
		}
		
		return false;
	}
	
	public function amountValidate(){
		
		if ($this->details->count() === 0){
			$cash = 0;
			$coins = 0;
			$checks = 0;
		}else{
			$cash = $this->details->first()->cash();
			$coins = $this->details->first()->coins();
			$checks = $this->details->first()->checks_sum;
		}

		$enteredAmount = $this->amount;
		$calculatedAmount = $cash + $coins + $checks;
		
		if($enteredAmount == $calculatedAmount){
			return null;
		}else{
			return "<span style='color:red;'>" . number_format($enteredAmount,2) . " DOES NOT EQUAL CALCULATED: " . number_format($calculatedAmount,2) . "</span>";
		}

	}
	
}
