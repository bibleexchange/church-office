<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Card;
use App\Meta;

class Entity extends Model {
	
	protected $table = 'entities';
	public $timestamps = false;
	protected $fillable = [ 'name','entity_type_id'];
	
	public function typeOf()
	{
	    return $this->belongsTo('App\EntityType','entity_type_id');
	}
	
	public function metas()
    {
    	return $this->hasMany('App\EntityMeta','entity_id');
    }
	
	public function getMeta($name)
    {
		$meta = Meta::where('name',$name)->first();
	
		if($this->metas->count() !== 0){
			//dd($this->metas->where('type',$meta->id)->last());
			return $this->metas->where('type',$meta->id)->last()->value;
		}else{
			return false;
		}
		
		
    }
	
	public function debits()
    {
    	return $this->hasMany('App\Transaction','from_entity_id');
    }
	
	public function credits()
    {
    	return $this->hasMany('App\Transaction','to_entity_id');
    }
	
	public function transactionEdits()
    {
    	return $this->hasMany('App\Transaction',' last_edit_by_id');
    }
	
	public function transactions()
    {
    	return Transaction::where('from_entity_id',$this->id)->orWhere('to_entity_id',$this->id)->orderBy('date','DESC')->paginate(15);
    }
	
	public function transactionsAll()
    {
    	return Transaction::where('from_entity_id',$this->id)->orWhere('to_entity_id',$this->id)->orderBy('date','ASC')->get();
    }
	
	public function balance()
	{
    	$bal = $this->credits()->sum('amount') -  $this->debits()->sum('amount');
		return $bal;
    }
	
	public function transactionsCard()
    {
		
		return new Card(
			$this->name . " (" . $this->typeOf->name . ")",
			"$ " . number_format($this->balance(),2),
			"",
			"/accounting/" . $this->id . "_" . str_replace(" ","-",strtolower($this->name)),
			"ion ion-stats-bars",
			[],
			1); 
    }
	 
}
