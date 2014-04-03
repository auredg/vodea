<?php

class Admin_StudioController extends \BaseController {
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin/studio/index', array('studios' => Studio::paginate()));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin/studio/create')->nest('form', 'admin/studio/form');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), array(
			'name' => 'required|unique:studios'
		));

		if ($validator->fails()) {
			return Redirect::route('admin.studio.create')->withInput()->withErrors($validator);
		} else {
			$studio = Studio::create(Input::all());
			return Redirect::route('admin.studio.index');
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
		$studio = Studio::find($id);
		return View::make('admin/studio/edit', compact('studio'))->nest('form', 'admin/studio/form', compact('studio'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$studio = Studio::find($id);
		$validator = Validator::make(Input::all(), array(
			'name' => 'required|unique:studios,name,' . $id
		));

		if ($validator->fails()) {
			return Redirect::route('admin.studio.edit', array($id))->withInput()->withErrors($validator);
		} else {
			$studio->update(Input::all());
			return Redirect::route('admin.studio.index');
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
		Studio::find($id)->delete();
		return Redirect::route('admin.studio.index');
	}

}