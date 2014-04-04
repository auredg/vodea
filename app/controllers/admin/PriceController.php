<?php

class Admin_PriceController extends \BaseController {
	
	/**
	 * Validation rules
	 * 
	 * @var array 
	 */
	protected $rules = array(
		'type'			=> 'required|in:rent,sell',
		'price'			=> 'required|numeric|min:0',
		'tax'			=> 'required|numeric|min:0',
		'is_promotion'	=> 'in:0,1',
		'start_at'		=> 'date',
		'end_at'		=> 'date',
	);
	
	/**
	 * Related video
	 *
	 * @var Video 
	 */
	protected $video = null;
	
	/**
     * Instantiate a new Admin_PriceController instance.
     */
    public function __construct()
    {
		$this->video = Video::findOrFail(Route::input('video'));
    }
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$prices = Price::select();
		
		if (Input::get('sort')) {
			$prices->orderBy(Input::get('sort'), Input::get('direction', 'asc'));
		}
		
		return View::make('admin/video/price/index', array('video' => $this->video, 'prices' => $prices->paginate()));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin/video/price/create', array('video' => $this->video))->nest('form', 'admin/video/price/form', array('video' => $this->video));
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
			return Redirect::route('admin.video.{video}.price.create', array($this->video->id))->withInput()->withErrors($validator);
		} else {
			$price = new Price(Input::all());
			$price->video_id = $this->video->id;
			$price->save();
			return Redirect::route('admin.video.{video}.price.index', array($this->video->id));
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		$price = Price::findOrFail(Route::input('price'));
		return View::make('admin/video/price/edit', array('video' => $this->video, 'price' => $price))->nest('form', 'admin/video/price/form', array('video' => $this->video, 'price' => $price));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$price = Price::findOrFail(Route::input('price'));
		$validator = Validator::make(Input::all(), $this->rules);

		if ($validator->fails()) {
			return Redirect::route('admin.video.{video}.price.edit', array($this->video->id))->withInput()->withErrors($validator);
		} else {
			$price->update(Input::all());
			return Redirect::route('admin.video.{video}.price.index', array($this->video->id));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Price::findOrFail(Route::input('price'))->delete();
		return Redirect::route('admin.video.{video}.price.index', array($this->video->id));
	}


}