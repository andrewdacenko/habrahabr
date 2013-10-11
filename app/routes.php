<?php

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));
Route::get('bookmarks', array('before' => 'auth', 'as' => 'home.bookmarks', 'uses' => 'HomeController@bookmarks'));

Route::get('by_tag/{name}', array('as' => 'home.by_tag', 'uses' => 'HomeController@byTag'))
	->where('name', '[A-Za-z0-9 -_]+');
Route::get('by_city/{name}', array('as' => 'home.by_city', 'uses' => 'HomeController@byCity'))
	->where('name', '[A-Za-z0-9 -_]+');
Route::get('by_company/{name}', array('as' => 'home.by_company', 'uses' => 'HomeController@byCompany'))
	->where('name', '[A-Za-z0-9 -_]+');

Route::get('offer_{id}', array('as' => 'home.offer', 'uses' => 'HomeController@showOffer'))->where('id', '[0-9]+');
Route::post('offer_{id}', array('before' => 'not_guest|regular_user', 'uses' => 'HomeController@commentOnOffer'))->where('id', '[0-9]+');

Route::get('logout', array('as' => 'login.logout', 'uses' => 'LoginController@logout'));

Route::group(array('before' => 'un_auth'), function()
{
	Route::get('login', array('as' => 'login.index', 'uses' => 'LoginController@index'));
	Route::post('login', array('uses' => 'LoginController@login'));
	Route::get('register', array('as' => 'login.register', 'uses' => 'LoginController@register'));
	Route::post('register', array('uses' => 'LoginController@store'));
	Route::get('password/remind', array('as' => 'password.remind', 'uses' => 'LoginController@showReminderForm'));
	Route::post('password/remind', array('uses' => 'LoginController@sendReminder'));
	Route::get('password/reset/{token}', array('as' => 'password.reset', 'uses' => 'LoginController@showResetForm'));
	Route::post('password/reset/{token}', array('uses' => 'LoginController@resetPassword'));
});


Route::group(array('before' => 'admin.auth'), function()
{
	Route::get('dashboard', function()
	{
		return View::make('login.dashboard');
	});

	Route::group(array('before' => 'manager_role_only'), function()
	{
		Route::resource('cities', 'CitiesController');

		Route::resource('companies', 'CompaniesController');

		Route::resource('tags', 'TagsController');

		Route::resource('offers', 'OffersController');
		
		Route::post('upload', array('uses' => 'HomeController@uploadOfferImage'));
	});

	Route::resource('comments', 'CommentsController');

	Route::group(array('before' => 'manager_role_only'), function()
	{
		Route::resource('roles', 'RolesController');

		Route::resource('users', 'UsersController');	
	});
});

Route::filter('un_auth', function()
{
	if (!Auth::guest()) {
		Auth::logout();
	}
});

Route::when('comments*', 'moderator_role_only');

Route::filter('admin_role_only', function()
{
	if (Auth::user()->isAdmin()) {
		return Redirect::intended('/')->withMessage('You don\'t have enough permissions to do that.');
	}
});

Route::filter('manager_role_only', function() 
{
	if (!Auth::user()->isManager()) {
		return Redirect::intended('/')->withMessage('You don\'t have enough permissions to do that.');
	}
});

Route::filter('moderator_role_only', function() 
{
	if (!Auth::user()->isModerator()) {
		return Redirect::intended('/')->withMessage('YYou don\'t have enough permissions to do that.');
	}
});

Route::filter('admin.auth', function() 
{
	if (Auth::guest()) {
		return Redirect::to('login');
	}
});

Route::filter('not_guest', function(){
	if (Auth::guest()) {
		return Redirect::intended('/')->withInput()->with('message', 'You should be logged in to provide this action.');
	}
});

Route::filter('regular_user', function(){
	if (!Auth::guest()) {
		if (!Auth::user()->isRegular()) {
			return Redirect::back()->with('message', 'You cannot do that due to your role.');
		}
	}
});