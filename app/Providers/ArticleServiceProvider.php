<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ArticleServiceProvider extends ServiceProvider
{
	/**
	 * Register article services.
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('App\Contracts\Article\IArticleRepository', 'App\Repositories\Article\ArticleRepository');
	}
}