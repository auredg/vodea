<?php

class Genre extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'genres';

	/**
	 * Fillables fields
	 *
	 * @var array
	 */
	protected $fillable = array('name');
	
	/**
	 * Use of timestamps
	 * 
	 * @var bool 
	 */
	public $timestamps = false;
	
	/**
	 * Get lists of Genre ordered
	 * 
	 * @return array
	 */
	public static function getList() {
		return self::orderBy('name')->lists('name', 'id');
	}
}