<?php

namespace App\Providers;

use Illuminate\Http\Request;
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


    public function boot(Request $request)
    {
        date_default_timezone_set('asia/dhaka');
        view()->share('url1', $request->segment(1));
        view()->share('url2', $request->segment(2));
        view()->share('appName', str_replace('-',' ',env('APP_NAME')));
    }
}
