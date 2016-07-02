<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model {
	
	protected $table = 'metas';
	public $timestamps = false;
	protected $fillable = [ 'name'];
	
	public function metas()
    {
    	return $this->hasMany('App\EntityMeta','type');
    }
	
}
