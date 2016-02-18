<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Offering;
use Input, Redirect;

class OfferingsController extends OfficeController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
				
		$allOfferings = Offering::orderBy('id','DESC')->get();
		
		return view('accounting.offerings.index',compact('allOfferings'));
	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$entry = new Offering;
		$entry->deposit_id = Input::get('deposit_id');		
		$entry->name = Input::get('name');
		$entry->created_at = Input::get('created_at');
		$entry->memo = Input::get('memo');
		$entry->save();
	 
		return Redirect::to('accounting/deposits/'.$entry->deposit->id.'#'.$entry->name)->with('message', 'Offering Successfully created!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

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
