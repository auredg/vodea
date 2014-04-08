<?php

class Language extends Eloquent {
	
	/**
	 * DB table name
	 * 
	 * @var string 
	 */
	protected $table = 'languages';
	
	
	/**
	 * Primary key for table
	 * 
	 * @var string 
	 */
	protected $primaryKey = 'code';
	
	
	/**
	 * Timestamp uses
	 * 
	 * @var string 
	 */
	public $timestamps = false;
}
