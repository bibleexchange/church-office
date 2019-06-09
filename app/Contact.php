<?php namespace App;

use DB, stdclass;

class Contact extends \Eloquent {

	protected $fillable = [
		'firstname' , 'lastname' , 'prefix' , 'middlename' , 'suffix' , 'birthday' , 'memo', 'image'
	];

	protected $appends = ['fullName'];
	
	protected $presenter = 'App\Presenters\ContactPresenter';

	public $collections = array(
	  'mailable',
	  'maine',
	  'outofstate',
	  'portland',
	  'church',
	  'preacher',
	  'recorded',
	  'supported_mission'
    );
	
	public $collections_select = array(
	 'contacts.prefix','contacts.suffix','contacts.firstname','contacts.lastname','addresses.addressee','addresses.address','addresses.city','addresses.state','addresses.zip','addresses.country','addresses.type','addresses.updated_at'
    );
	
	public function columns()
	{
		return $this->fillable;
	}
	
	public function addresses()
	  {
		return $this->belongsToMany('App\Address');
	  }
	  
	public function collections()
	  {
		return $this->belongsToMany('App\Collection');
	  }
	
	 public function gifts(array $range = null)
    {
    	if ($range === null){
    		//return $this->hasMany('App\Gift');
			return $this->hasMany('App\Transaction','from_entity_id');
    	}else{
    		//return $this->hasMany('App\Gift')->whereBetween('created_at',$range);
			return $this->hasMany('App\Transaction','from_entity_id')->whereBetween('created_at',$range);
    	}
		
    }
         
	public function audios()
    {
        return $this->hasMany('App\Audio', 'contact_id');
    }

	public function getContactFullNameAttribute()
	{
		return $this->lastname .', '. $this->firstname;
	}

	public function selectList()
	{
		
	$contacts1 = $this->orderBy('lastname','ASC')->select('firstname','lastname','suffix','id')->get();
			
	foreach($contacts1 as $c)
		{
			$contacts[$c['id']] = $c['lastname'].', '.$c['firstname'].' '.$c['suffix'];
		}
	
	return $contacts;
	}
				

	public function preached($contact_id, $per_page=15)
	{
		return DB::table('contacts')
		->join('audios', 'audios.contact_id', '=', 'contacts.id')
		->select('contacts.id','contacts.firstname','contacts.lastname','contacts.image','contacts.suffix','audios.date','audios.title','audios.bible')
		->orderBy('audios.date','DESC')
		->where('contacts.id','=',$contact_id)
		->paginate($per_page);
		
	}
	
	public static function recorded()
	{
		$top = DB::table('contacts')
		->join('audios', 'audios.contact_id', '=', 'contacts.id')
		->select('contacts.id','contacts.firstname','contacts.lastname','contacts.suffix')
		->orderBy(DB::raw('COUNT(contacts.id)'),'DESC')
		->orderBy('contacts.lastname','ASC')
		->orderBy('contacts.firstname','ASC')
		->groupBy('contacts.id')
		->limit(10)
		->get();
		
		$blank[0] =  new stdClass;
		$blank[0]->id = 'disabled';
		$blank[0]->firstname = '';
		$blank[0]->lastname = '';
		
		$blank[1] =  new stdClass;
		$blank[1]->id = 'disabled';
		$blank[1]->firstname = '';
		$blank[1]->lastname = '-- Alphabetical Listing --';
		
		$all = DB::table('contacts')
		->join('audios', 'audios.contact_id', '=', 'contacts.id')
		->select('contacts.id','contacts.firstname','contacts.lastname','contacts.suffix')
		->orderBy('contacts.lastname','ASC')
		->orderBy('contacts.firstname','ASC')
		->groupBy('contacts.id')
		->get();
		
		$list = array_merge( $top,$blank,$all );
		
		return $list;
	}
	//Study on laravel scopes to better do this later.
	public function mailable()
	{
		
		return DB::table('addresses')
		->leftJoin('address_contact', 'addresses.id', '=', 'address_contact.address_id')
		->leftJoin('contacts', 'address_contact.contact_id', '=', 'contacts.id')
		->select($this->collections_select)
		->orderBy('addresses.zip','ASC')
		->groupBy('addresses.id')
		->get();
	}
	
	public function maine()
	{
		
		return DB::table('addresses')
		->leftJoin('address_contact', 'addresses.id', '=', 'address_contact.address_id')
		->leftJoin('contacts', 'address_contact.contact_id', '=', 'contacts.id')
		->select($this->collections_select)
		->orderBy('addresses.zip','ASC')
		->groupBy('addresses.id')
		->where('addresses.state','=','ME')
		->get();
	}

		public function outofstate()
	{
		
		return DB::table('addresses')
		->leftJoin('address_contact', 'addresses.id', '=', 'address_contact.address_id')
		->leftJoin('contacts', 'address_contact.contact_id', '=', 'contacts.id')
		->select($this->collections_select)
		->orderBy('addresses.zip','ASC')
		->groupBy('addresses.id')
		->where('addresses.state','!=','ME')
		->get();
	}

		public static function supported_missions()
	{
		
		$supported_missions = Collection::find(19)->contacts();

		return $supported_missions;
				
	}
	
	public function getFullNameAttribute()
    {    
		return $this->attributes['firstname'] . ' ' . $this->attributes['lastname']. ' ' . $this->attributes['suffix']
;
    }
	
		public function allPerPage($integer,$sortBy)
	  {
		return $this->orderBy($sortBy)->paginate($integer);
	  }
	  
	  	public function filter($filter,$paginate)
	{
		$addresses = Address::where($filter[0],'=',$filter[1])->select('id')->lists('id');
		
		$contacts = Contact::whereHas('addresses', function($q) use ($addresses)
			{
				$q->whereIn('addresses.id', $addresses);

			})->paginate($paginate);
		
		return $contacts;
	}
	
	public static function make($firstname, $lastname, $prefix, $middlename, $suffix, $birthday, $memo, $image){
		
		$contact = new static(compact('firstname','lastname','prefix','middlename','suffix','birthday','memo','image'));

		return $contact;
	}
	
	public function editUrl(){
		return url('/people/'.$this->id);
	}

	public function amount($value){
		
		$array = [657,665,670,701];
		$per = null;

		if(in_array($this->id, $array)){

			switch($this->id){
				case 657://IN HOUSE MISSIONS
					$per = '.3';
					break;
				case 665://GSP
					$per = '.3';
					break;
				case 670://CFCM
					$per = '.2';
					break;
				case 701://LW
					$per = '.2';
					break;

			}

			return $per * $value;

		}
			return $per;
	}

}