<?php

class CommentsController extends BaseController {

	/**
	 * Comment Repository
	 *
	 * @var Comment
	 */
	protected $comment;

	public function __construct(Comment $comment)
	{
		parent::__construct();
		
		$this->comment = $comment;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$comments = $this->comment->paginate();

		return View::make('comments.index', compact('comments'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('comments.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Comment::$rules);

		if ($validation->passes())
		{
			$this->comment->create($input);

			return Redirect::route('comments.index');
		}

		return Redirect::route('comments.create')
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
		$comment = $this->comment->findOrFail($id);

		return View::make('comments.show', compact('comment'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$comment = $this->comment->find($id);

		if (is_null($comment))
		{
			return Redirect::route('comments.index');
		}

		return View::make('comments.edit', compact('comment'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Comment::$rules);

		if ($validation->passes())
		{
			$comment = $this->comment->find($id);
			$comment->update($input);

			return Redirect::route('comments.show', $id);
		}

		return Redirect::route('comments.edit', $id)
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
		$this->comment->find($id)->delete();

		return Redirect::route('comments.index');
	}

}
