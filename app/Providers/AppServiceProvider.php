<?php

namespace App\Providers;

use App\Actions\TokenActions;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use TCG\Voyager\Facades\Voyager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        Voyager::addAction(TokenActions::class);
    }
}
