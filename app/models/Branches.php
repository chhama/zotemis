<?php
class Branches extends Eloquent{
	
	protected $table = 'branches';
	
	public function sales(){
		return $this->hasMany('sales','id','branches_id');
	}
}