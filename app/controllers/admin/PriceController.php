<?php

class Admin_PriceController extends \BaseController {
	
	/**
	 * Validation rules
	 * 
	 * @var array 
	 */
	protected $rules = array(
		'price'			=> 'required|numeric|min:0',
		'is_promotion'	=> 'required|in:0,1',
		'start_at'		=> 'date',
		'end_at'		=> 'date',
	);
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($video_id)
	{
		$prices = Price::select();
		
		if (Input::get('sort')) {
			$prices->orderBy(Input::get('sort'), Input::get('direction', 'asc'));
		}
		
		return View::make('admin/video/price/index', array('prices' => $prices->paginate()));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($video_id)
	{
		return View::make('admin/video/price/create')->nest('form', 'admin/video/price/form');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($video_id)
	{
		$validator = Validator::make(Input::all(), $this->rules);

		if ($validator->fails()) {
			return Redirect::route('admin.price.create')->withInput()->withErrors($validator);
		} else {
			$price = Price::create(Input::all());
			return Redirect::route('admin.price.show', array($price->id));
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($video_id, $id)
	{
		return View::make('admin/video/price/show', array('price' => Price::find($id)));
	}

	/**
	 * Display price of specified resource
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function price($video_id, $id)
	{
		return View::make('admin/video/price/price', array('price' => Price::find($id)));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($video_id, $id)
	{
		$price = Price::find($id);
		return View::make('admin/video/price/edit', compact('price'))->nest('form', 'admin/video/price/form', compact('price'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($video_id, $id)
	{
		$price = Price::find($id);
		$validator = Validator::make(Input::all(), $this->rules);

		if ($validator->fails()) {
			return Redirect::route('admin.price.edit', array($id))->withInput()->withErrors($validator);
		} else {
			$price->update(Input::all());
			return Redirect::route('admin.price.show', array($price->id));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($video_id, $id)
	{
		Price::find($id)->delete();
		return Redirect::route('admin.price.index');
	}


}