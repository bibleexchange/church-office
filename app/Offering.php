<?php namespace App;

use App\Core\MoneyTrait;

class Offering extends \Eloquent {
	
	use MoneyTrait;
	
	protected $fillable = [ 'OfferingName','OfferingMemo' , 'DepositsID'];
	
	public static $rules = array(
	'OfferingName'=> 'AlphaNum',
	'DepositsID'=> 'Integer', 
	'OfferingMemo'=> ''
    );

	public function deposit()
	{
	    return $this->belongsTo('\App\Deposit');
	}

 	public function gifts()
    {
        return $this->hasMany('\App\Gift');
    }
	
    public static function selectList($limit = NULL)
	{
		
		if (is_null($limit)){
			return \App\Offering::orderBy('id','DESC')->get()->lists('name', 'id');
		}else {
			return \App\Offering::orderBy('id','DESC')->take($limit)->get()->lists('name', 'id');
			
		}
	}
	
}