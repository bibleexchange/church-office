<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {
	
	use Authenticatable, CanResetPassword;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	*/
	protected $hidden = ['password', 'remember_token'];
	
	protected $presenter = 'Deliverance\Presenters\UserPresenter';
	
	public static function confirm($confirmation_code)
	{
		 
		$user = User::where('confirmation_code',$confirmation_code)->firstOrFail();
	
		$user->confirmation_code = null;
		$user->confirmed = 1;
		 
		return $user;
	}
	
	public function isConfirmed()
	{
		if ($this->confirmed > 0) return true;
	
		return false;
	}
	
	public function joined()
	{
		return Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
	}
	
}