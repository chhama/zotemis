<?php

class BranchesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$branches = Branches::orderBy('branch_name','asc')->paginate();
		return View::make('branches.index')->with(array(
						'branches' => $branches
					));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$branch = new Branches();
		$branch->branch_name	= Input::get('branch_name');
		$branch->phone			= Input::get('phone');
		$branch->save();

		$branches = Branches::orderBy('branch_name','asc')->paginate();
		return Redirect::route('branches.index');

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
		$branchesById = Branches::find($id);
		$branches = Branches::orderBy('branch_name','asc')->paginate();
		return View::make('branches.edit')->with(array(
						'branches' => $branches,
						'branchesById' => $branchesById
					));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$branch = Branches::find($id);
		$branch->branch_name	= Input::get('branch_name');
		$branch->phone			= Input::get('phone');
		$branch->save();

		$branchesById = Branches::find($id);
		$branches = Branches::orderBy('branch_name','asc')->paginate();
		return Redirect::route('branches.edit',array($id));

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Branches::destroy($id);

		$branches = Branches::orderBy('branch_name','asc')->paginate();
		return Redirect::route('branches.index');

	}


}
