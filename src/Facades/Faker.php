<?php

namespace hatamiarash7\PFaker\Facades;

use Illuminate\Support\Facades\Facade;

class PFaker extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'PFaker';
	}
}
