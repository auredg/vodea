<?php

class Admin_HomeController extends BaseController {

	public function index() {
//		$translations = Translation::translateAll('videos', 'summary', 1);
//		
//		foreach ($translations as $translation) {
//			var_dump($translation->language->name);
//			var_dump($translation->value);
//		}
		return View::make('admin/index');
	}

}