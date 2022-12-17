<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    // public function register()
    // {
    //     //
    // }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        // Bootstarpを使う
        Paginator::useBootstrap();
        
        \URL::forceScheme('https'); // https化
        $this->app['request']->server->set('HTTPS', 'on');
        
        // Paginator::useBootstrapFive();    　公式ドキュメント
       //または Paginator::useBootstrapFour();　　   公式ドキュメント
            
    }
}
