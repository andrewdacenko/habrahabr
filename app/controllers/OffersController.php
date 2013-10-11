<?php

class OffersController extends BaseController {

	/**
	 * Offer Repository
	 *
	 * @var Offer
	 */
	protected $offer;

	public function __construct(Offer $offer)
	{
		parent::__construct();
		
		$this->offer = $offer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$offers = $this->offer->sortLatest()->paginate();

		return View::make('offers.index', compact('offers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('offers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = Offer::$rules;
		$rules['expires'] .= '|after:'.date('Y-m-d', strtotime('+1 day')).'|before:'.date('Y-m-d', strtotime('+1 month'));

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->passes())
		{
			$tags = array();

			foreach (explode(', ', Input::get('tags')) as $tag_name) {
				if ($tag = Tag::where('name', '=', $tag_name)->first()) {
					$tags[] = $tag->id;
				}
			}

			if (count($tags) == 0) {
				return Redirect::route('offers.create')
					->withInput()
					->withErrors($validation)
					->with('message', 'Insert at least one tag.');
			}
			
			$offer = $this->offer->create(Input::except('tags', 'file'));
			$offer->tags()->sync($tags);

			return Redirect::route('offers.index');
		}

		return Redirect::route('offers.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$offer = $this->offer->findOrFail($id);

		return View::make('offers.show', compact('offer'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$offer = $this->offer->find($id);

		if (is_null($offer))
		{
			return Redirect::route('offers.index');
		}

		return View::make('offers.edit', compact('offer'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$offer = $this->offer->find($id);

		if (!$offer) {
			return Response::error('404');
		}

		$rules = Offer::$rules;
		$rules['expires'] .= '|after:'.date('Y-m-d', strtotime('+1 day')).'|before:'.date('Y-m-d', strtotime('+1 month'));

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->passes())
		{
			$tags = array();

			foreach (explode(', ', Input::get('tags')) as $tag_name) {
				if ($tag = Tag::where('name', '=', $tag_name)->first()) {
					$tags[] = $tag->id;
				}
			}

			if (count($tags) == 0) {
				return Redirect::route('offers.create')
					->withInput()
					->withErrors($validation)
					->with('message', 'Insert at least one tag.');
			}
			
			$offer->update(Input::except('tags', 'file', '_method'));
			$offer->tags()->sync($tags);

			return Redirect::route('offers.show', $id);
		}

		return Redirect::route('offers.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->offer->find($id)->delete();

		return Redirect::route('offers.index');
	}

}
