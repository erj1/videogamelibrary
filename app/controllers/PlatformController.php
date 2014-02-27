<?php

class PlatformController extends BaseController
{
	public function index()
	{
		$platforms = Platform::with('games')->get();

		return View::make('platform.index', compact('platforms'));
	}

	public function show($platformId)
	{
		$platform = Platform::with('games')->findOrFail($platformId);

		return View::make('platform.show', compact('platform'));
	}
}