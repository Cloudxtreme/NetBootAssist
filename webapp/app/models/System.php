<?php

class System extends \Eloquent {
	protected $softDelete = true;
	protected $guarded = ['id', 'mac_address', 'user_id'];
	protected $fillable = ['mac_address'];
	
	public function tasks()
    {
        return $this->hasMany('Task');
    }
}