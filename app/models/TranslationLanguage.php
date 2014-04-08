<?php

class TranslationLanguage extends Eloquent {
	
	/**
	 * DB table name
	 * 
	 * @var string 
	 */
	protected $table = 'translation_languages';
	
	
	/**
	 * Timestamp uses
	 * 
	 * @var string 
	 */
	public $timestamps = false;
	
	
	/**
	 * TranslationLanguage belongsTo Language
	 * 
	 * @return type
	 */
	public function language() {
		return $this->belongsTo('Language', 'language_code');
	}
}
