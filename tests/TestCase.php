<?php

namespace AlexGh12\HelpCenter\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
	protected function getPackageProviders($app)
	{
		return [\AlexGh12\HelpCenter\HelpCenterServiceProvider::class];
	}

	protected function defineEnvironment($app)
	{
		$app['config']->set('HelpCenter.enabled', true);
		$app['config']->set('HelpCenter.path_docs', 'resources/docs/');
		$app['config']->set('HelpCenter.path_views', 'help-center');
		$app['config']->set('HelpCenter.default_file', 'introduction.md');
		$app['config']->set('HelpCenter.auth', false);
	}

	protected function getBasePath()
	{
		return dirname(__DIR__);
	}
}
