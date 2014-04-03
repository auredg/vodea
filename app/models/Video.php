<?php

class Video extends Eloquent {
	
	/**
	 * DB table name
	 * 
	 * @var string 
	 */
	protected $table = 'videos';
	
	/**
	 * Fillables fields
	 *
	 * @var array
	 */
	protected $fillable = array('active', 'studio_id', 'name', 'title', 'type', 'parent_id', 'summary', 'description');
	
	/**
	 * Types available
	 *
	 * @var array
	 */
	protected static $types = array('movie' => 'Movie', 'show' => 'TV Show', 'episode' => 'Episode');
	
	/**
	 * Return current model type name
	 * 
	 * @return type
	 */
	public function type() {
		return self::getType($this->type);
	}
	
	/**
	 * Return $type type name
	 * 
	 * @param string $type
	 * @return string
	 */
	public static function getType($type) {
		return isset(self::$types[$type]) ? self::$types[$type] : null;
	}
	
	/**
	 * Return all types list
	 * 
	 * @return array
	 */
	public static function getTypes() {
		return self::$types;
	}
	
	/**
	 * Return a list of tv shows
	 * 
	 * @return array Lists of shows
	 */
	public static function getShows() {
		return self::where('type', 'show')->lists('name', 'id');
	}
	
	/**
	 * Video hasOne Studio relationship
	 * 
	 * @return HasOne
	 */
	public function studio()
    {
        return $this->hasOne('Studio');
    }
	
	/**
	 * Video hasMany Video relationship
	 * 
	 * @return HasMany
	 */
	public function videos()
    {
        return $this->hasOne('Video', 'parent_id', 'id');
    }
	
	/**
	 * Video hasMany Price relationship
	 * 
	 * @return HasMany
	 */
	public function prices()
    {
        return $this->hasMany('Price');
    }
}
