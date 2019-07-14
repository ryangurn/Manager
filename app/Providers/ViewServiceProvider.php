<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts._header', function($view) {
            $navbarRoutes = [
                "Home" => [
                    "route" => 'HomeController@index'
                ],
                "Contact Us" => [
                    "route" => 'HomeController@contact'
                ],
                "Calendar" => [
                    "route" => 'HomeController@calendar'
                ]
            ];
            View::share('navbarRoutes', collect($navbarRoutes));
        });


        View::composer('layouts._verify', function($view) {
           $currentUser =  auth()->user();
           View::share('currentUser', $currentUser);
        });
    }
}
