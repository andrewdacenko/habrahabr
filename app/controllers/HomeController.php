<?php

class HomeController extends BaseController {

	/**
	 * Display a listing of offers.
	 *
	 * @return Response
	 */
	public function index()
	{
		$offers = Offer::active()->sortLatest()->paginate();
		$title = "All Offers";
		
		return View::make('home.index', compact('offers', 'title'));
	}

	/**
	 * Display a listing of bookmarked offers.
	 *
	 * @return Response
	 */
	public function bookmarks()
	{
		$offers = Auth::user()->usersOffers()->paginate();

		$title = "My Bookmarked Offers";
		
		return View::make('home.index', compact('offers', 'title'));
	}

	/**
	 * Display an offer.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showOffer($id)
	{
		$offer = Offer::findOrFail($id);

		return View::make('offers._show', compact('offer'));
	}

	/**
	 * Storing comment on offer.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function commentOnOffer($id)
	{
		$offer = Offer::findOrFail($id);

		if ($offer->usersComments->contains(Auth::user()->id)) {
			return Redirect::back()->withInput()->with('message', 'You have already commented on this Offer');
		}

		$rules = array('body' => 'required|min:10|max:500', 'mark' => 'required|numeric|between:1,5');
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) {
			$offer->usersComments()->attach(Auth::user()->id, array(
				'body' => Input::get('body'), 
				'mark' => Input::get('mark')
				));
			return Redirect::back();
		}

		return Redirect::back()->withInput()->withErrors($validator);
	}

	/**
	 * Display a listing of offers that belongs to tag.
	 *
	 * @param  string  $name
	 * @return Response
	 */
	public function byTag($name)
	{
		$tag = Tag::whereName($name)->firstOrFail();

		$offers = $tag->offers()->active()->sortLatest()->paginate();

		$title = "Offers tagged as: " . $tag->name;

		return View::make('home.index', compact('offers', 'title'));
	}

	/**
	 * Display a listing of offers that belongs to city.
	 *
	 * @param  string  $name
	 * @return Response
	 */
	public function byCity($name)
	{
		$city = City::whereName($name)->firstOrFail();

		$offers = $city->offers()->active()->sortLatest()->paginate();

		$title = "Offers in: " . $city->name;

		return View::make('home.index', compact('offers', 'title'));
	}

	/**
	 * Display a listing of offers that belongs to company.
	 *
	 * @param  string  $name
	 * @return Response
	 */
	public function byCompany($name)
	{
		$company = Company::whereName($name)->firstOrFail();

		$offers = $company->offers()->active()->sortLatest()->paginate();

		$title = "Offers by: " . $company->name;

		return View::make('home.index', compact('offers', 'title'));
	}

	public function uploadOfferImage()
	{
		$rules = array('file' => 'mimes:jpeg,png');

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Response::json(array('message' => $validator->messages()->first('file')));
		}

		$dir = '/images'.date('/Y/m/d/');
		
		do {
			$filename = str_random(30).'.jpg';
		} while (File::exists(public_path().$dir.$filename));

		Input::file('file')->move(public_path().$dir, $filename);

		return Response::json(array('filelink' => $dir.$filename));
	}
}