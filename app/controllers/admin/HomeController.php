<?php

class Admin_HomeController extends BaseController {

	public function index() {
		return View::make('admin/index');
	}

}