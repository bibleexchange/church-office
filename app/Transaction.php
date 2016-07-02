<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
	
	protected $table = 'transactions';
	public $timestamps = true;
	protected $fillable = [ 'amount','from_entity_id','to_entity_id', 'category_id','date','memo','seriel','last_edit_by_id'];
	
	public function from()
	{
	    return $this->belongsTo('App\Entity','from_entity_id');
	}
	
	public function to()
	{
	    return $this->belongsTo('App\Entity','to_entity_id');
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
}
