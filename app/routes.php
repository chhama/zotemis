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

Route::get('/', function()
{
	return View::make('home.index');
});

Route::resource('branches', 'BranchesController');
Route::resource('products', 'ProductsController');
Route::get('sales/demandlist', array('uses'=>'SalesController@demandlist','as'=>'sales.demandlist'));
Route::get('sales/{id}/demand', array('uses'=>'SalesController@demand','as'=>'sales.demand'));
Route::resource('sales', 'SalesController');