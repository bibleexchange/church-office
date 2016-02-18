<?php namespace Deliverance\Http\Controllers;

use Deliverance\Entities\Address;

use Deliverance\Http\Requests;
use Deliverance\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input, Flash, Redirect;

class AddressController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('addresses.create')
		->with('pageTitle','Create New Address');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$address = Address::make(
			Input::get('addressee'),
			Input::get('address'), 
			Input::get('city'),
			Input::get('state'), 
			Input::get('zip'),
			Input::get('country'), 
			Input::get('type')
			);

		$address->save();
		
		Flash::message('address created!');
		
		return Redirect::back();
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
	
	public function mailing()
	{
		$addresses = Address::where('country','=','usa')->orderBy('zip','ASC')->get();
		$maine = Address::where('state','=','ME')->orderBy('zip','ASC')->get();
		$outOfState = Address::where('state','!=','ME')->where('country','=','usa')->orderBy('zip','ASC')->get();
		
		return view('addresses.mailing',compact('addresses','maine','outOfState'));
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
		//
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
