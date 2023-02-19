<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Paginator::useBootstrap();
        view()->composer('pages.sidebar', function($view){
            $view->with('topPosts', Post::getTopPosts());
            $view->with('lastPosts', Post::orderBy('created_at', 'desc')->take(3)->get());
            $view->with('categories', Category::all());
            $view->with('tags', Tag::all());
            $view->with('admin', User::getFirstPost());
        });
        view()->composer('pages.footer', function($view){
            $view->with('lastPosts', Post::orderBy('id', 'desc')->take(3)->get());
            $view->with('admin', User::getFirstPost());
        });
        view()->composer('pages.related', function($view){
            $view->with('lastPosts', Post::orderBy('id', 'desc')->take(3)->get());
            $view->with('admin', User::getFirstPost());
        });


    }
}
