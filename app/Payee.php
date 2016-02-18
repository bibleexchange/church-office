<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Payee extends Model {
	
	public $timestamps = true;
	
	protected $fillable = [ 'name','address', 'contact'];

}
