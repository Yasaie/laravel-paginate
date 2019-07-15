<?php

namespace Yasaie\Paginate;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
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
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/pagination'),
        ], 'views');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'Paginate');
    }
}
