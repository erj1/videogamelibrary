<?php

class GameController extends BaseController
{
	public function getIndex()
	{
		$games = Game::with('platform')->get();

		return View::make('game.index', compact('games'));
	}

	public function showGame($gameId)
	{
		$game = Game::findOrFail($gameId);

		return View::make('game.show', compact('game'));
	}
}
