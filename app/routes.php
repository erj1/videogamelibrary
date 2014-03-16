<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
|-------------------------------------------------------------------------
| View Composer
|-------------------------------------------------------------------------
|
| View composers are called everytime the indicated view is called.
|
*/

// By setting the a view composer on this view, the admin can add new
// platforms to the application and they will be immediately shown
// in the platform dropdown.
View::composer('template.guest.base', function($view) {
	$view->with(
		'navPlatforms',
		Platform::orderBy('name', 'asc')->remember(10, 'navPlatforms')->get()->lists('name', 'id')
	);
});

/*
|-------------------------------------------------------------------------
| Guest Routes
|-------------------------------------------------------------------------
|
| These are the routes which do not require authentication to view.
|
*/

// Default Route
Route::get('/', 'GameController@getIndex');

// About Us Page
Route::get('about-us', function() { return View::make('page.about'); });

// A single game page
Route::get('games/{game}', 'GameController@showGame');

Route::get('platform', 'PlatformController@index');
Route::get('platform/{platformId}', 'PlatformController@show');

Route::controller('login', 'LoginController');
Route::get('logout', 'LoginController@getLogout');

Route::group(['before' => 'auth'], function() {

	Route::get('account', 'UserController@edit');
	Route::put('account', 'UserController@update');

});

Route::group(['before' => 'auth', 'prefix' => 'admin'], function() {

	Route::resource('platform', 'AdminPlatformController');
	Route::resource('game', 'AdminGameController');

});
