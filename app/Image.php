<?php namespace App;

class Image extends \Eloquent {
	
	protected $fillable = ['name','src','alt_text','created_at','updated_at'];
	
	public static function lessons(){
		
		$this->hasMany('App\Lesson');
	}
	
}