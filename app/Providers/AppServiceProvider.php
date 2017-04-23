<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Keyword;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $keywords = Keyword::all()->toArray();
        view()->composer('*',function($view) use ($keywords) {
            $view->with('keywords',$keywords);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
