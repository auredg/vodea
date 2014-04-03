<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Fillables fields
	 *
	 * @var array
	 */
	protected $fillable = array('login', 'email', 'password', 'group');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * All groups translated
	 *
	 * @var array
	 */
	protected static $groups = array('user' => 'User', 'admin' => 'Administrator');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
	
	/**
	 * Check if user is admin
	 * 
	 * @return bool
	 */
	public function isAdmin() {
		return $this->group === 'admin';
	}
	
	/**
	 * Mutator for password hash
	 * 
	 * @param string $pass
	 */
	public function setPasswordAttribute($pass) {
		$this->attributes['password'] = Hash::make($pass);
	}
	
	/**
	 * Getter for group name
	 * 
	 * @return string Group name of $this
	 */
	public function group() {
		return self::getGroup($this->group);
	}

	/**
	 * Get the group name
	 * 
	 * @param string $group
	 * @return string Group name of $group
	 */
	public static function getGroup($group = null) {		
		return isset(self::$groups[$group]) ? self::$groups[$group] : null;
	}

	/**
	 * Get the groups
	 * 
	 * @return array Groups
	 */
	public static function getGroups() {		
		return self::$groups;
	}
}