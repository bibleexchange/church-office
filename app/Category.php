<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	public $timestamps = false;
	
	protected $fillable = [ 'name'];

	public function expenses()
    {
        return $this->hasMany('\App\Expense');
    }
	
	public function transactions()
    {
        return $this->hasMany('App\Transaction','category_id');
    }
}
