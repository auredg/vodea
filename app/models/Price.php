<?php

class Price extends Eloquent {
	
	/**
	 * DB table name
	 * 
	 * @var string
	 */
	protected $table = 'prices';

	/**
	 * Fillables fields
	 *
	 * @var array
	 */
	protected $fillable = array('type', 'price', 'tax', 'start_at', 'end_at', 'is_promotion');
	
	/**
	 * Use of timestamps
	 * 
	 * @var bool
	 */
	public $timestamps = false;

	/**
	 * Types list
	 *
	 * @var array
	 */
	protected static $types = array('rent' => 'To rent', 'sell' => 'To sell');
	
	/**
	 * Extending save method
	 * 
	 * @param array $options
	 * @return bool
	 */
	public function save(array $options = array()) {
		if (empty($this->start_at)) {
			$this->start_at = null;
		}
		if (empty($this->end_at)) {
			$this->end_at = null;
		}
		
		return parent::save($options);
	}
	
	/**
	 * Get current type name
	 * 
	 * @return string
	 */
	public function type() {
		return isset(self::$types[$this->type]) ? self::$types[$this->type] : null;
	}
	
	
	/*
	 * Static methods
	 */
	
	
	/**
	 * Return types list
	 * 
	 * @return array
	 */
	public static function getTypes() {
		return self::$types;
	}
}
