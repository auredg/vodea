<?php

class Person extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'persons';

	/**
	 * Fillables fields
	 *
	 * @var array
	 */
	protected $fillable = array('firstname', 'lastname', 'nickname', 'birthday', 'sex');
	
	/**
	 * Use of timestamps
	 * 
	 * @var bool 
	 */
	public $timestamps = false;
	
	/**
	 * Person has roles relation
	 * 
	 * @return type
	 */
	public function roles() {
		return $this->belongsToMany('Role', 'person_roles', 'person_id', 'role_id');
	}
}