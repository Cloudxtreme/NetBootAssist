<?php

class DashboardController extends BaseController {
	protected $layout = "webinterface/layout";
	public function showDashboard()
	{
		$this->layout->content =  View::make('webinterface/dashboard');
	}
	
	public function assignSystemOverview()
	{
		$Systems = System::wherePending(1);
		$this->layout->content =  View::make('webinterface/assignSystemOverview')->with('Systems', $Systems);
		
	}
}