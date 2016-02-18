<?php namespace App;

class Address extends \Eloquent{
	
	public $fillable = array('addressee','address','city','state', 'zip','country','type');	

	protected $appends = ['defaultAddressee'];
	
	protected $table = 'addresses';
	
	public $timestamps = true;

	public function contacts()
	  {
		return $this->belongsToMany('App\Contact');
	  }
	
	public function selectList()
	{
		
		$address = $this->orderBy('zip','ASC')->orderBy('addressee','ASC')->select('addressee','address','city','state','id')->get();

		foreach($address as $a)
			{
				$addresses[$a['id']] = '('.$a['state'].') '. $a['address'].', '.$a['city'].' ['.$a['addressee'].']';
			}
		
		return $addresses;
	}
	
		public function allPerPage($integer)
	  {
		return $this->paginate($integer);
	  }
	
	public function statesList(){
			
		return $this->groupBy('state')->orderBy('state')->lists('state');
			
	}
	
	public static function make($addressee,$address,$city,$state,$zip,$country,$type){
		
		$address = new static(compact('addressee','address','city','state','zip','country','type'));

		return $address;
	}
	
	public function getDefaultAddresseeAttribute(){
		if($this->addressee !== null){
			return $this->addressee;
		} else {
			
			return $this->contacts()->first()->fullname;
	
		}
	}
	
}