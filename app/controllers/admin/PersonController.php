<?php

class Admin_PersonController extends \BaseController {
	
	protected $role = '';
	
	public function __construct() {
		$this->role = Route::input('role');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$role = $this->role;
		$persons = Person::whereHas('roles', function($q) use($role) {
			$q->where('key', $role);
		})->paginate();
		return View::make('admin/person/index', array('role' => $this->role, 'persons' => $persons));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin/person/create', array('role' => $this->role))->nest('form', 'admin/person/form', array('role' => $this->role));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), array(
			'name' => 'required|unique:persons'
		));

		if ($validator->fails()) {
			return Redirect::route('admin.person.{role}.create', array($this->role))->withInput()->withErrors($validator);
		} else {
			$person = Person::create(Input::all());
			return Redirect::route('admin.person.{role}.index', array($this->role));
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$person = Person::find($id);
		return View::make('admin/person/edit', compact('person'))->nest('form', 'admin/person/form', compact('person'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$person = Person::find($id);
		$validator = Validator::make(Input::all(), array(
			'name' => 'required|unique:persons,name,' . $id
		));

		if ($validator->fails()) {
			return Redirect::route('admin.person.{role}.edit', array($this->role, $id))->withInput()->withErrors($validator);
		} else {
			$person->update(Input::all());
			return Redirect::route('admin.person.{role}.index', array($this->role));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Person::find($id)->delete();
		return Redirect::route('admin.person.{role}.index', array($this->role));
	}

}