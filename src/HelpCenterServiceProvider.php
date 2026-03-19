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
		$config = [
			'namespace' => 'AlexGh12\HelpCenter\Http\Controllers',
			'prefix' => config('HelpCenter.path_views'),
		];

		if (config('HelpCenter.auth')) {
			$config['middleware'] = 'auth';
		}

		return $config;
	}

	/**
	 * Register the package's publishable resources.
	 *
	 * @return void
	 */
	private function registerPublishing()
	{
		if ($this->app->runningInConsole()) {
			$this->publishes([
				__DIR__ . '/../config/HelpCenter.php' => config_path('HelpCenter.php'),
			], 'help-center-config');

			$this->publishes([
				__DIR__ . '/../resources/docs' => base_path('resources/docs'),
			], 'help-center-docs');
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
