<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Expense;
use App\Libraries\Helpers;
use Input, Redirect;

class ExpensesController extends OfficeController {

	function __construct(){
		$this->model = new Expense;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
 public function index($filter = NULL)
    {
		
    	$range = ['2015-01-01','2015-12-31'];

    	if (isset($_GET['range_start']) && isset($_GET['range_end'])){
    		$range = [$_GET['range_start'],$_GET['range_end']];
    	}
    	
    	$datesFromRangeArray = Helpers::createDateRangeArray($range);
    	
		$expenses = Expense::orderBy('created_at','DESC')->whereBetween('created_at',$range)->get();
    	$accounts = \App\Account::lists('title','id');
		$categories = \App\Category::lists('name','id');
		
		$colors = ['#f56954','#00a65a','#3c8dbc','#3794fc','#00CD00','#FF7400','#00428b','#FF0000','#009A9A','#f56954','#00a65a','#3c8dbc','#3794fc','#00CD00','#FF7400','#00428b','#FF0000','#009A9A'];
		
		$items = [];
		
		foreach($categories AS $key => $value){

			$items[str_replace(' ','_',$value)] = $expenses->filter(function($e) use( &$key)
			{
				return $e->isCategory($key);
			});
			
		}
		  
        return view('accounting.expenses.index',compact('range','expenses','accounts','categories','items','colors'));
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
		dd(Input::all());
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
		dd(Input::all());
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
