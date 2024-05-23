<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
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
        Paginator::useBootstrapFive();
        view()->composer('layouts.site', function ($view) {
            $categories =  Cache::rememberForever('category', function () {
                return Category::all();
            });
            $currensyData = Cache::remember('currensyData', 60*60*6, function () {
                $currensyRaw = Http::get('https://cbu.uz/oz/arkhiv-kursov-valyut/json/');
                $currensyJson = $currensyRaw->json();
                $currensy = [
                    'usd' => [...$currensyJson[0]],
                    'eur' => [...$currensyJson[1]],
                    'rub' => [...$currensyJson[2]],
                ];
                return $currensy;
            });

            $view->with(compact('categories', 'currensyData'));
        });

        view()->composer('sections.popularPosts', function ($view) {
            $popularposts = Cache::remember('popularposts', 60*60, function (){
                return Post::limit(4)->orderBy('view', 'DESC')->get();
            });
            $view->with(compact('popularposts'));
        });

        view()->composer('sections.mainPosts', function ($view) {
            $specialposts = Cache::remember('specialposts', 60*60, function (){
                return Post::where('is_special', true)->limit(6)->latest()->get();
            });
            $view->with(compact('specialposts'));
        });

        view()->composer('layouts.admin', function ($view) {
            $messages = Message::latest()->get();
            $view->with(compact('messages'));
        });
        view()->composer('layouts.statistics', function ($view) {
            $stat = Cache::remember('statistics', 60*60*6, function () {
                $covid = Http::get('https://api.covidtracking.com/v1/us/current.json');
                $datajson = $covid->json();
                return [...$datajson[0]];
            });

            $view->with(compact('stat'));
        });
    }
}
