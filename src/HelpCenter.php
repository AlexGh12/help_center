<?php

namespace AlexGh12\HelpCenter;

use Illuminate\Support\Facades\Facade;

class HelpCenter extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'HelpCenter';
	}
}
