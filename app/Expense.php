<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model {
	
	public $timestamps = true;
	
	protected $fillable = [ 'reference','amount','memo' , 'payee_id','category_id','account_id'];
	
	public function account()
	{
	    return $this->belongsTo('\App\Account');
	}
	
}