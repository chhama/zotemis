<?php

class ProductsController extends \BaseController {

		/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Products::orderBy('prod_name','asc')->paginate();
		return View::make('products.index')->with(array(
						'products' => $products
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
		$branch = new Products();
		$branch->prod_name	= Input::get('prod_name');
		$branch->prod_rate	= Input::get('prod_rate');
		$branch->agent_rate	= Input::get('agent_rate');
		$branch->save();

		$products = Products::orderBy('prod_name','asc')->paginate();
		return Redirect::route('products.index');

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
		$productsById = Products::find($id);
		$products = Products::orderBy('prod_name','asc')->paginate();
		return View::make('products.edit')->with(array(
						'products' => $products,
						'productsById' => $productsById
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

		$branch = Products::find($id);
		$branch->prod_name	= Input::get('prod_name');
		$branch->prod_rate	= Input::get('prod_rate');
		$branch->agent_rate	= Input::get('agent_rate');
		$branch->save();

		$productsById = Products::find($id);
		$products = Products::orderBy('prod_name','asc')->paginate();
		return View::make('products.edit')->with(array(
						'products' => $products,
						'productsById' => $productsById
					));

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Products::destroy($id);

		$products = Products::orderBy('prod_name','asc')->paginate();
		return Redirect::route('products.index');
	}



}
