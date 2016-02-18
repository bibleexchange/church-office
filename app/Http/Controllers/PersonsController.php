<?php namespace App\Http\Controllers;

use App\Account;
use App\Contact;
use App\Address;
use App\Gift;

use App\Libraries\Helpers;
use Auth, Input, Flash, Redirect;

class PersonsController extends Controller {

	function __construct(){
		$this->middleware('auth');
		$this->model = new Contact;			
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($filter = NULL)
    {
		$resourceName = 'Contacts';
		$resourceName1 = 'contacts';
		
		if ($filter !== NULL){
			$filter = explode(':',$filter,2);
			$Resource = $this->model->filter($filter,15);
			$filterName = $filter[0];
		}else{
			$Resource = $this->model->allPerPage(1000,'lastname');
			$filterName = 'Filter By State';
		}
		
		$Address = new Address;
		$states = array();
		foreach ($Address->statesList() AS $key => $value){
			$states[$key] = 'addresses.state:'.$value;
		}		

        // load the view and pass the nerds
        return view('persons.index')
			->with('pageTitle','View All Contacts')
			->with('columns',$this->model->columns())
			->with('resourceName',$resourceName)
			->with('resourceName1',$resourceName1)
			->with('Resource',$Resource)
			->with('filterName',$filterName)
			->with('filterList',$states);
    }

    public function missions()
    {		
    	$missions = Contact::supported_missions()->get();
  
		$formLetterLink = 'https://docs.google.com/document/d/1JMNBA3r67KU15m2i2TJNw3nSdAVZbrzNmFrS37xVN4s/copy';
		$pageTitle = 'Missions';

		if (isset($_GET['bal'])){
			$missions_balance = $_GET['bal'];
		}else{
			$missions_balance = 1000;
		}

		$mission = Account::find(2);

		foreach($mission->deposits()->orderBy('deposited','DESC')->get() AS $d)
		{
			$offerings[] = array_flatten($d->offerings()->orderBy('id','DESC')->get());
		}

		$offerings = array_flatten($offerings);

        // load the view and pass the nerds
        return view('contacts.missions', compact('formLetterLink','pageTitle','missions','missions_balance','offerings'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function create()
    {
        return view('persons.create')
		->with('pageTitle','Create New Contact')
		->with('columns',$this->model->columns());
    }
	
	public function store()
    {   	
		$contact = Contact::make(
			Input::get('firstname'),
			Input::get('lastname'), 
			Input::get('prefix'),
			Input::get('middlename'), 
			Input::get('suffix'),
			Input::get('birthday'), 
			Input::get('memo'),
			Input::get('image')
			);

		$contact->save();
		
		return Redirect::back();
	
	}
	
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function range()
    {   	
    	return Redirect::to('/people/'.Input::get('contact_id').'?range_start='.Input::get('start').'&&range_end='.Input::get('end'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    	$range = ['2012-01-01','2016-01-01'];
    	
    	if (isset($_GET['range_start']) && isset($_GET['range_end'])){
    		$range = [$_GET['range_start'],$_GET['range_end']];
    	}

    	$datesFromRangeArray = Helpers::createDateRangeArray($range);

        $contact = Contact::find($id);
		
        $gifts = $contact->gifts($range)->get();
        
        $sumOfGifts = Gift::sumOfGifts($gifts);
        
        return view('persons.show')
            ->with('contact', $contact)
			->with('columns',$this->model->columns())
			->with('pageTitle','Show Contact | '.$contact->firstname.' '.$contact->lastname)
			->with('addresses',$contact->addresses)
        	->with('gifts',$gifts)
        	->with('sumOfGifts',$sumOfGifts)
        	->with('datesFromRangeArray',$datesFromRangeArray);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
		$address = new Address;
		 
        return view('contacts.edit')
            ->with('contact', $contact)
			->with('addresses', $address->selectList())
			->with('columns',$this->model->columns())
			->with('pageTitle','Edit Contact | '.$contact->firstname.' '.$contact->lastname);
    }

	public function attach($id,$resource)
	{
		$resourceName = '\App\\' . ucfirst($resource);
		
		if (isset($_GET['state'])){
			$Resource1 = new $resourceName();
			$Resource = $Resource1->filter('state',$_GET['state']);
		}else{
			
			$Resource = new $resourceName;
			$Resource = $Resource::all();
			
		}
		
		$contact = $this->model->find($id);

        return view('persons.attach')
            ->with('resourceName',ucfirst($resource))
			->with('pageTitle','Attach Addresses')
			->with('Resource',$Resource)
			->with('filterName','States')
			->with('filterList',['ma','me','nh','ga','nc','va','wv'])
			->with('contact',$contact);
		
	}
	
	public function postAttach()
	{
		$contact = Contact::find(Input::get('contact_id'));
		$address = Address::find(Input::get('address_id'));
		$contact->addresses()->attach($address);
		
		return Redirect::to($contact->editUrl());
	}
	
	public function deleteAttach($entry_id, $chapter_id)
	{
		
		$entryModel = $this->Resource->names['one'];
		
		$entry = $entryModel::find($entry_id);
		$chapter = Chapter::find($chapter_id);
		$entry->chapters()->detach($chapter);
		
		return Redirect::back()->withMessage('Relationship Deleted!');
	}
	
}