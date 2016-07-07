<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenter\PresentableTrait;

class Transaction extends Model {
	
	use PresentableTrait;
	
	protected $table = 'transactions';
	public $timestamps = true;
	protected $fillable = [ 'amount','from_entity_id','to_entity_id', 'category_id','date','memo','seriel','last_edit_by_id'];
	
	protected $presenter = 'App\TransactionPresenter';
	
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
	
	public static function getTemplate(){
		$mostRecentTransaction = Transaction::get()->last();
		$mostRecentTransaction->amount = null;
		$mostRecentTransaction->memo = null;
		$mostRecentTransaction->seriel = null;
		
		return $mostRecentTransaction;
		
	}
	
	public static function recents(){
		
		$transactions = Transaction::orderBy('updated_at','DESC')->take(50)->get();
		
		$recents = new \stdClass();
		$recents->from = [];
		$recents->to = [];
		$recents->category = [];
		
		foreach($transactions AS $t){
			
			if(count($recents->from) < 10){
				$recents->from[$t->from->id] = $t->from->name;
			}
			
			if(count($recents->to) < 10){
				$recents->to[$t->to->id] = $t->to->name;
			}
			
			if(count($recents->category) < 10){
				$recents->category[$t->category->id] = $t->category->name;
			}
			
		}
		
		return $recents;
	}
	
}
