<?php
class Products extends Eloquent{
	
	protected $table = 'products';

	public function sales(){
		return $this->hasMany('sales','id','products_id');
	}
	
}