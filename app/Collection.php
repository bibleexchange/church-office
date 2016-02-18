<?php namespace App;

class Collection extends \Eloquent {
	
	protected $fillable = ['name'];

	protected $table = 'collections';
	
	public function contacts()
	  {
		return $this->belongsToMany('App\Contact');
	  }
	
}