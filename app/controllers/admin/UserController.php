<?php

class Admin_UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin/user/index', array('users' => User::paginate()));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin/user/create')->nest('form', 'admin/user/form');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), array(
			'login'		=> 'required',
			'password'	=> 'required|same:password_confirm',
			'email'		=> 'required|email|unique:users',
			'group'		=> 'required|in:user,admin',
		));

		if ($validator->fails()) {
			return Redirect::route('admin.user.create')->withInput()->withErrors($validator);
		} else {
			$user = User::create(Input::all());
			return Redirect::route('admin.user.show', array($user->id));
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('admin/user/show', array('user' => User::find($id)));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		return View::make('admin/user/edit', compact('user'))->nest('form', 'admin/user/form', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);
		$data = Input::all();
		$validator = Validator::make($data, array(
			'login'		=> 'required',
			'password'	=> 'same:password_confirm',
			'email'		=> 'required|email|unique:users,email,' . $id,
			'group'		=> 'required|in:user,admin',
		));

		if ($validator->fails()) {
			return Redirect::route('admin.user.edit', array($id))->withInput()->withErrors($validator);
		} else {
			if (empty($data['password'])) {
				unset($data['password']);
			}
			$user->update($data);
			return Redirect::route('admin.user.show', array($user->id));
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
		User::find($id)->delete();
		return Redirect::route('admin.user.index');
	}

}