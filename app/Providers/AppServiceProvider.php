<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
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
        if (Cookie::get('lang') !== null){
            $deCrypt = Crypt::decrypt(Cookie::get('lang'), false);
            $tokens = explode('|', $deCrypt);
            if(isset($tokens[1])) {
                App::setLocale($tokens[1]);
            }
        }
    }
}
