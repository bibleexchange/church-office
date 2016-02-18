<?php namespace App;

use Deliverance\Mailers\UserMailer;

class UserRepository {
	
	public function __construct(UserMailer $mailer)
	{
		$this->mailer = $mailer;
	}
	
    /**
     * Persist a user
     *
     * @param User $user
     * @return mixed
     */
    public function save(User $user)
    {
    	
    	return $user->save();
    }
    
    public function sendEmail(User $user)
    {
    	$this->mailer->sendConfirmMessageTo($user);
    	return $user;
    	
    }
    
   
    /**
     * Get a paginated list of all users.
     *
     * @param int $howMany
     * @return mixed
     */
    public function getPaginated($howMany = 25)
    {
        return User::orderBy('username', 'asc')->paginate($howMany);
    }

    /**
     * Fetch a user by their username.
     *
     * @param $username
     * @return mixed
     */
    public function findByUsername($username)
    {
        return User::with('notes')->whereUsername($username)->first();
    }
    
    /**
     * Find a user by their id.
     *
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return User::findOrFail($id);
    }
    
    /**
     * Follow a Deliverance user.
     *
     * @param $userIdToFollow
     * @param User $user
     * @return mixed
     */
    public function follow($userIdToFollow, User $user)
    {
        return $user->followedUsers()->attach($userIdToFollow);
    }

    /**
     * Unfollow a Deliverance user.
     *
     * @param $userIdToUnfollow
     * @param User $user
     * @return mixed
     */
    public function unfollow($userIdToUnfollow, User $user)
    {
        return $user->followedUsers()->detach($userIdToUnfollow);
    }

} 