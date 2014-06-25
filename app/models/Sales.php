<?php
class Sales extends Eloquent{
	
	protected $table = 'sales';

	public function branches(){
		return $this->belongsTo('branches');
	}

	public function products(){
		return $this->belongsTo('sales');
	}
	
}