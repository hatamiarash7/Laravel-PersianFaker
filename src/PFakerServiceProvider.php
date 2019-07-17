<?php

namespace hatamiarash7\PFaker;

use Illuminate\Support\ServiceProvider;

class PFakerServiceProvider extends ServiceProvider
{
	protected $defer = false;

	public function boot()
	{

	}

	public function register()
	{
		$this->app->bind('PFaker', function () {
			return new PFaker();
		});
	}

}
