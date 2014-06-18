<?php

class BootController extends BaseController 
{
	/* Being called from the iPXE bootloader */
	public function getScript( $accountHash, $macAddress )
	{
		$templateParameters = array();
		$templateParameters['mac_address'] = $macAddress;
		
		// Check valid mac address
		$macAddress = strtoupper($macAddress);
		if (!preg_match('/^([0-9A-F]{2}[:]){5}([0-9A-F]{2})$/', $macAddress))
			return View::make('ipxe/invalidmac', $templateParameters);
		
		// fetch System object otherwise create it
		$System = System::firstOrCreate( array( 'mac_address' => $macAddress ) );
		$System->touch();
		$templateParameters['system_id'] = $System->id;
		
		// Check tasks
		$Task = $System->tasks()->where('state', 1)->first();
		if ($Task)
		{
			$templateParameters['task_id'] = $Task->id;
			$templateParameters['task_type'] = $Task->type;
			$templateParameters['task_parameters'] = $Task->parameters;
			$templateParameters['task_state'] = $Task->state;
			return $this->runTask( $System, $Task, $templateParameters );
		}
		
		// Check non_blocking to show banner or just exit bootrom.
		if ($System->non_blocking)
		{
			$System->pending = true;
			$System->save();
			return View::make('ipxe/regularboot', $templateParameters);
		}
		else
			return View::make('ipxe/bootbanner', $templateParameters);
		
		// We should never need this failover but just in case.
		return View::make('ipxe/unknownbooterror', $templateParameters );
	}
	
	/* Actually provides the script for the task being executed */
	private function runTask( $System, $Task, $templateParameters )
	{
		// Mark task as running
		$Task->state = 2;
		$Task->save();
		
		if (View::exists('ipxe/tasks/'.$Task->task_type))
		{
			return View::make('ipxe/tasks/'.$Task->task_type, $templateParameters);
		}
		else {
			return View::make('ipxe/tasks/unknown', $templateParameters );
		}
	
	}
}