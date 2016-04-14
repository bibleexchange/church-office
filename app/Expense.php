<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model {
	
	public $timestamps = true;
	
	protected $fillable = [ 'reference','amount','memo' , 'payee_id','category_id','account_id'];
	
	public function account()
	{
	    return $this->belongsTo('\App\Account');
	}
	
	public function category()
	{
	    return $this->belongsTo('\App\Category');
	}
	
	public function isCategory($catId)
	{
	    
		if($this->category_id === $catId){
			return true;
		}
		
		return false;
	}
	
}