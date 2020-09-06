<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // ルートURLを設定
        URL::forceRootUrl(\config('app.url'));

        // 必要に応じてsslを強制する
        if (\config('app.env') !== 'local') {
            URL::forceScheme('https');
            $this->app['request']->server->set('HTTPS','on');
        }
    }
}
