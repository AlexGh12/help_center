<?php

namespace AlexGh12\HelpCenter;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class HelpCenterServiceProvider extends ServiceProvider
{
	/**
	 * Inicia los servicios de la aplicación
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerCommands();
		$this->registerPublishing();

		if (! config('HelpCenter.enabled')) {
			return;
		}

		$this->registerRoutes();
		$this->loadViewsFrom(
			__DIR__ . '/../resources/views',
			'HelpCenter'
		);
	}

	/**
	 * Register the package routes.
	 *
	 * @return void
	 */
	private function registerRoutes()
	{
		Route::group($this->routeConfiguration(), function () {
			$this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
		});
	}

	/**
	 * Get the Telescope route group configuration array.
	 *
	 * @return array
	 */
	private function routeConfiguration()
	{
		return [
			'namespace' => 'AlexGh12\HelpCenter\Http\Controllers',
			'prefix' => config('HelpCenter.path_views'),
		];
	}

	/**
	 * Register the package's publishable resources.
	 *
	 * @return void
	 */
	private function registerPublishing()
	{
		if ($this->app->runningInConsole()) {
			//
		}
	}

	/**
	 * Registra los servicios de la aplicación.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->mergeConfigFrom(
			__DIR__ . '/../config/HelpCenter.php',
			'HelpCenter',
		);
	}
}
