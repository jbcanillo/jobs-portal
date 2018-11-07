<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Increase the string length to resolve migration issue
        Schema::defaultStringLength(191);

        //Gets the current route for highlighting the currect menu
        view()->composer('*', function ($view) {

            $current_route_name = \Request::route()->getName();
            //$current_route_name = str_replace('.index','',$current_route_name);
            $current_route_name = explode('.',$current_route_name);
            $view->with('current_route_name', $current_route_name[0]);
    
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
        $this->app->bind('path.public', function()
		{
            return base_path('public_html');//FOR PROD
            //return base_path('public');
		});
    }
}
