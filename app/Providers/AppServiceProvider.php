<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Admin\Category;
use App\Models\Admin\Post;
use App\Models\Message;
use Illuminate\Support\Facades\Http;

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
            $currensyRaw = Http::get('https://cbu.uz/oz/arkhiv-kursov-valyut/json/');
            $currensyJson = $currensyRaw->json();
            $currensyData = [
                'usd' => [...$currensyJson[0]],
                'eur' => [...$currensyJson[1]],
                'rub' => [...$currensyJson[2]],
            ];
            $view->with(compact('categories', 'currensyData'));
        });

        view()->composer('sections.popularPosts', function ($view) {
            $popularposts = Post::limit(4)->orderBy('view', 'DESC')->get();
            $view->with(compact('popularposts'));
        });
        view()->composer('layouts.admin', function ($view) {
            $messages = Message::latest()->get();
            $view->with(compact('messages'));
        });
        view()->composer('layouts.statistics', function ($view) {
            $covid = Http::get('https://api.covidtracking.com/v1/us/current.json');
            $datajson = $covid->json();
            $stat = [...$datajson[0]];
            $view->with(compact('stat'));
        });
    }
}
