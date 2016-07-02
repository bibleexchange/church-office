<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EntityType extends Model {
	
	protected $table = 'entity_types';
	public $timestamps = false;
	protected $fillable = [ 'name'];
	
	public function entities()
    {
    	return $this->hasMany('App\Entity');
    }
	
	public function peopleRel()
    {
    	return $this->hasMany('App\Entity')->where('entity_type_id',1);
    }
	
	public function churchesRel()
    {
    	return $this->hasMany('App\Entity')->where('entity_type_id',2);
    }
	
	public function businessesRel()
    {
    	return $this->hasMany('App\Entity')->where('entity_type_id',3);
    }
	
	public function accountsRel()
    {
    	return $this->hasMany('App\Entity')->where('entity_type_id',6)->orderBy('id','DESC');
    }
	//////////////////////////////////////////////////////////////////////////////////////

	public static function people()
    {
    	return Self::find(1)->peopleRel;
    }
	
		public static function churches()
    {
    	return Self::find(2)->churchesRel;
    }
	
		public static function businesses()
    {
    	return Self::find(3)->businessesRel;
    }
		public static function accounts()
    {
    	return Self::find(6)->accountsRel;
    }
}
