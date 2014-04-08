<?php

class Translation extends Eloquent {
	
	/**
	 * DB table name
	 * 
	 * @var string 
	 */
	protected $table = 'translations';
	
	
	/**
	 * Timestamp uses
	 * 
	 * @var string 
	 */
	public $timestamps = false;
	
	
	/*
	 * Public methods 
	 */
	
	public function save(array $options = array()) {
		if (!$this->type) {
			$this->type = DB::connection()->getDoctrineColumn($this->getAttribute('table'), $this->getAttribute('field'))->getType()->getName();
		}
		
		return parent::save($options);
	}
	
	
	/*
	 * Static methods
	 */
	
	/**
	 * Return all translations
	 * 
	 * @param string $table
	 * @param string $field
	 * @param int $primary
	 * @return Collection
	 */
	public static function translateAll($table, $field, $primary) {
		$translation = self::where('table', $table)->where('field', $field)->where('primary', $primary)->first();
		
		if (empty($translation)) {
			$translation = new Translation();
			$translation->setAttribute('table', $table);
			$translation->setAttribute('field', $field);
			$translation->setAttribute('primary', $primary);
			$translation->save();
		}
		
		return $translation->values;
	}
	
	
	/*
	 * Eloquent relationships
	 */
	
	
	
	/**
	 * Video HasMany Languages relationship
	 * 
	 * @return HasMany
	 */
	public function values() {
        return $this->hasMany('TranslationLanguage', 'translation_id');
    }
}
