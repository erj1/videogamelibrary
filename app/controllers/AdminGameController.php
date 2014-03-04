<?php

class AdminGameController extends BaseController
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('game.admin.index', [
			'games' => Game::with('platform')->get()
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// get the available platforms
		$platforms = Platform::orderBy('name', 'asc')->get()->lists('name', 'id');

		// get the available ratings
		$esrbs = Esrb::all()->lists('name', 'id');

		return View::make('game.admin.create', [
			'platforms' => $platforms,
			'esrbs'     => $esrbs,
			'rateRange' => Game::$ratingRange
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
			'platform' => 'required|integer|exists:platforms,id',
			'esrb'     => 'required|integer|exists:esrbs,id',
			'name'     => 'required|max:255',
			'rating'   => 'required|integer|in:1,2,3,4,5', # update to be more dynamic
			'image'    => 'image|max:50'
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		dd(Input::all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}