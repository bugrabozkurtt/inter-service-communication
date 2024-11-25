<?php

namespace BugraBozkurt\InterServiceCommunication\Providers;

use Illuminate\Support\ServiceProvider;
use BugraBozkurt\InterServiceCommunication\Factories\ClientFactory;
use BugraBozkurt\InterServiceCommunication\Enums\ServiceEndpointEnum;

class InterServiceCommunicationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        ServiceEndpointEnum::all()->each(function ($port, $key) {
            $this->app->singleton("{$key}.client", function () use ($key) {
                return ClientFactory::make($key);
            });
        });
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../Config/inter_service_communication.php' => config_path('inter_service_communication.php'),
        ], 'config');
    }
}
