<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateGiftRequest;
use App\Http\Controllers\Controller;
use App\Gift;
use Input, Redirect;
use Illuminate\Http\Request;

class GiftsController extends OfficeController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		return view(
			'accounting.gifts.show',[
			'pageTitle'=>'Input',
			'offerings'=> $this->offering->selectList(),
			'givers'=> $this->contact->selectList(),
			'src_url'=>'',
			'deposits'=>$this->deposit->selectList(),
			]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$offering = new Offering;
		$givers = Contact::orderBy('lastname', 'ASC')->get();

		if(isset($_GET['offering_id'])){ 
				$offering = Offering::find($_GET['offering_id']);
		}
		
		return view('accounting.gifts.create',compact('offering','givers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateGiftRequest $request)
	{

			$entry = new Gift;
			$entry->other = Input::get('other');		
			$entry->penny = Input::get('penny');
			$entry->nickel = Input::get('nickel');
			$entry->dime = Input::get('dime');
			$entry->quarter = Input::get('quarter');
			$entry->halfD = Input::get('halfD');
			$entry->oneD = Input::get('oneD');
			$entry->twoD = Input::get('twoD');
			$entry->fiveD = Input::get('fiveD');
			$entry->tenD = Input::get('tenD');
			$entry->twentyD = Input::get('twentyD');
			$entry->fiftyD = Input::get('fiftyD');
			$entry->hundredD = Input::get('hundredD');
			$entry->seriel = Input::get('seriel');  
			$entry->contact_id = Input::get('contact_id');
			$entry->memo = Input::get('memo');
			$entry->offering_id = Input::get('offering_id');
			$entry->save();
		 
			return Redirect::back()->with('message', 'Donation Successfully created!');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
			$entry = Gift::find($id);
			$entry->other = Input::get('other');		
			$entry->penny = Input::get('penny');
			$entry->nickel = Input::get('nickel');
			$entry->dime = Input::get('dime');
			$entry->quarter = Input::get('quarter');
			$entry->halfD = Input::get('halfD');
			$entry->oneD = Input::get('oneD');
			$entry->twoD = Input::get('twoD');
			$entry->fiveD = Input::get('fiveD');
			$entry->tenD = Input::get('tenD');
			$entry->twentyD = Input::get('twentyD');
			$entry->fiftyD = Input::get('fiftyD');
			$entry->hundredD = Input::get('hundredD');
			$entry->seriel = Input::get('seriel');  
			$entry->contact_id = Input::get('contact_id');
			$entry->memo = Input::get('memo');
			$entry->offering_id = Input::get('offering_id');
			$entry->save();
		 
			return Redirect::back()->with('message', 'Donation Successfully created!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}