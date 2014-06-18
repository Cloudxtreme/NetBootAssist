<?php

class Task extends \Eloquent 
{
	protected $guarded = ['id', 'system_id', 'type', 'parameters'];
	protected $fillable = ['system_id', 'type', 'parameters'];	
	
	public function system()
    {
        return $this->belongsTo('system');
    }
}