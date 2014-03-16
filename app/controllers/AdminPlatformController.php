<?php

class AdminPlatformController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$platforms = Platform::with('games')->get();

		return View::make('platform.admin.index', compact('platforms'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('platform.admin.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
			'name'  => 'required|max:255',
			'alias' => 'required|max:16|unique:platforms,alias'
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$platform = Platform::create([
			'name' => Input::get('name'),
			'alias' => Input::get('alias')
		]);

		Session::flash(
			'success',
			"Successfully create the platform, <strong>{$platform->name}</strong>."
		);

		Cache::forget('navPlatforms');

		return Redirect::action('AdminPlatformController@index');
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
		$platform = Platform::findOrFail($id);

		return View::make('platform.admin.edit', compact('platform'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = [
			'name'  => 'required|max:255',
			'alias' => 'required|max:16|unique:platforms,alias,'.$id
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$platform = Platform::findOrFail($id);

		$platform->name  = Input::get('name');
		$platform->alias = Input::get('alias');

		$platform->save();

		Session::flash(
			'success',
			"Successfully updated the platform, <strong>{$platform->name}</strong>."
		);

		return Redirect::action('AdminPlatformController@index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$platform = Platform::with('games')->findOrFail($id);

		foreach ($platform->games as $game) {

			// delete the game image
			unlink(public_path().$game->getImageUrlAttribute());

			// delete the game record
			$game->delete();
		}

		$platform->delete();

		Cache::forget('navPlatforms');

		return Redirect::action('AdminPlatformController@index');
	}

}