<?php namespace App\Http\Controllers;

use Auth, Input, Flash, Redirect;

class CalendarsController extends Controller {

	function __construct(){
		$this->middleware('auth');	
	}
    
	/**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($filter = NULL)
    {
        return view('calendar');
    }
	
}