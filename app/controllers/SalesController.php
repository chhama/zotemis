<?php

class SalesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$salesByDate = Sales::groupby('sales_date','branches_id')->paginate();
		return View::make('sales.index')->with(array(
						'salesByDate'	=> $salesByDate
					));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$products = Products::paginate();
		return View::make('sales.create')->with(array(
						'products'	=> $products
					));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$products_id= Input::get('products_id');
		$branches_id= Input::get('branches_id');
		$prod_rate	= Input::get('prod_rate');
		$ob			= Input::get('ob');
		$issued		= Input::get('issued');
		$received	= Input::get('received');
		$trans		= Input::get('trans');
		$return		= Input::get('return');
		$sold		= Input::get('sold');
		$demand		= Input::get('demand');
		$sales_date	= Input::get('sales_date');
		foreach ($prod_rate as $key => $value) {
			$sales = new Sales();
			$sales->products_id = $products_id[$key];
			$sales->branches_id = 1;//$branches_id[$key];
			$sales->ob 			= $ob[$key];
			$sales->issued		= $issued[$key];
			$sales->received	= $received[$key];
			$sales->trans		= $trans[$key];
			$sales->sold		= $sold[$key];
			$sales->demand		= $demand[$key];
			$sales->sales_date	= $sales_date;
			$sales->save();
		}

		$products = Products::paginate();
		return View::make('sales.create')->with(array(
						'products'	=> $products
					));
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
