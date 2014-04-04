<?php

class Admin_GenreController extends \BaseController {
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin/genre/index', array('genres' => Genre::paginate()));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin/genre/create')->nest('form', 'admin/genre/form');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), array(
			'name' => 'required|unique:genres'
		));

		if ($validator->fails()) {
			return Redirect::route('admin.genre.create')->withInput()->withErrors($validator);
		} else {
			$genre = Genre::create(Input::all());
			return Redirect::route('admin.genre.index');
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
		$genre = Genre::find($id);
		return View::make('admin/genre/edit', compact('genre'))->nest('form', 'admin/genre/form', compact('genre'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$genre = Genre::find($id);
		$validator = Validator::make(Input::all(), array(
			'name' => 'required|unique:genres,name,' . $id
		));

		if ($validator->fails()) {
			return Redirect::route('admin.genre.edit', array($id))->withInput()->withErrors($validator);
		} else {
			$genre->update(Input::all());
			return Redirect::route('admin.genre.index');
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
		Genre::find($id)->delete();
		return Redirect::route('admin.genre.index');
	}

}