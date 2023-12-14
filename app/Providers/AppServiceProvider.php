<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Admin\Category;
use App\Models\Admin\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
				view()->composer('layouts.site', function ($view) {
					$categories = Category::all();
					$view->with(compact('categories'));
				});

				view()->composer('sections.popularPosts', function ($view) {
					$popularposts = Post::limit(4)->orderBy('view', 'DESC')->get();
					$view->with(compact('popularposts'));
				});
    }
}
