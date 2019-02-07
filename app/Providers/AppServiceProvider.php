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
        view()->share('url1', $request->segment(1));
        view()->share('url2', $request->segment(2));
    }
}
