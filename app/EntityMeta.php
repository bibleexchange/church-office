<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EntityMeta extends Model {
	
	protected $table = 'entity_types';
	public $timestamps = false;
	protected $fillable = [ 'name'];
	
	public function entity()
	{
	    return $this->belongsTo('App\Entity','entity_id');
	}
	
	public function typeOf()
	{
	    return $this->belongsTo('App\Meta','type');
	}
	
}
