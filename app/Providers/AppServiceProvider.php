<?php

namespace App\Providers;

use App\DataObjects\CategoryData;
use App\DataObjects\PostData;
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
                $categoriesData = Category::all();
                return  $categoriesData->transform(function ($category) {
                    return CategoryData::createFromEloquentModel($category);
                });
            });
            $currencyData = Cache::remember('currencyData', 60*60*6, function () {
                $currencyRaw = Http::get('https://cbu.uz/oz/arkhiv-kursov-valyut/json/');
                $currencyJson = $currencyRaw->json();
                return [
                    'usd' => [...$currencyJson[0]],
                    'eur' => [...$currencyJson[1]],
                    'rub' => [...$currencyJson[2]],
                ];
            });

            $view->with(compact('categories', 'currencyData'));
        });

        view()->composer('sections.popularPosts', function ($view) {
            $popularposts = Cache::remember('popularposts', 60*60, function (){
                $posts = Post::query()->limit(4)->orderBy('view', 'DESC')->get();
                return $posts->transform(function ($post) {
                    return PostData::createFromEloquentModel($post);
                });
            });
            $view->with(compact('popularposts'));
        });

        view()->composer('sections.mainPosts', function ($view) {
            $specialposts = Cache::remember('specialposts', 60*60, function (){
                $posts = Post::query()->where('is_special', true)->limit(6)->latest()->get();
                return $posts->transform(function ($post) {
                    return PostData::createFromEloquentModel($post);
                });
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
