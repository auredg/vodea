<?php

class Admin_VideoController extends \BaseController {
	
	/**
	 * Validation rules
	 * 
	 * @var array 
	 */
	protected $rules = array(
		'parent_id' => 'exists:videos,id',
		'type'		=> 'required|in:movie,episode,show',
		'name'		=> 'required|unique:videos,name',
		'title'		=> 'required',
	);
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$videos = Video::select();
		
		if (Input::get('sort')) {
			$videos->orderBy(Input::get('sort'), Input::get('direction', 'asc'));
		}
		
		return View::make('admin/video/index', array('videos' => $videos->paginate()));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin/video/create')->nest('form', 'admin/video/form');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), $this->rules);
		
		if ($validator->fails()) {
			return Redirect::route('admin.video.create')->withInput()->withErrors($validator);
		} else {
			$video = Video::create(Input::all());
			$video->genres()->sync(Input::get('genres'));
			return Redirect::route('admin.video.show', array($video->id));
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
		return View::make('admin/video/show', array('video' => Video::find($id)));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$video = Video::find($id);
		$video->genres = $video->genres()->lists('id');
		
		return View::make('admin/video/edit', compact('video'))->nest('form', 'admin/video/form', compact('video'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$video = Video::find($id);
		$rules = $this->rules;
		$rules['name'].= ',' . $id;
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('admin.video.edit', array($id))->withInput()->withErrors($validator);
		} else {
			$video->update(Input::all());
			$video->genres()->sync(Input::get('genres'));
			return Redirect::route('admin.video.show', array($video->id));
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
		Video::find($id)->delete();
		return Redirect::route('admin.video.index');
	}


}