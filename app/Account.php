<?php namespace App;

class Account extends \Eloquent {

	protected $fillable = ['title','location','locationid','seriel'];

	public static $rules = array(
    'title'=>'required',
    'location'=>'',
    'locationid'=>'integer',
    'seriel'=>''
    );

	public function deposits()
    {
        return $this->hasMany('App\Deposit');
    }

	public function selectList()
	{
	    return $this->orderBy('id','DESC')->get()->lists('title', 'id');
	}

}