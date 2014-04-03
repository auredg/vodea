<?php

class Studio extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'studios';

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
}