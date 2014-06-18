<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class geturl extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'geturl';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Retrieves the application URL to shell scripting';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		echo 'localhost:8000';
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			#array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			#array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
