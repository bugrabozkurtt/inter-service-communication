<?php

namespace BugraBozkurt\InterServiceCommunication\Providers;

use Illuminate\Support\ServiceProvider;
use BugraBozkurt\InterServiceCommunication\Factories\ClientFactory;
use BugraBozkurt\InterServiceCommunication\Enums\ServiceEndpointEnum;

class InterServiceCommunicationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        foreach (ServiceEndpointEnum::toArray() as $service) {
            $this->app->singleton("{$service->value}.client", function () use ($service) {
                return ClientFactory::make($service->value);
            });
        }

        $this->mergeConfigFrom(
            __DIR__ . '/../config/jwt.php',
            'jwt'
        );

        $this->mergeConfigFrom(
            __DIR__ . '/../config/inter_service_communication.php',
            'inter_service_communication'
        );
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../Config/inter_service_communication.php' => config_path('inter_service_communication.php'),
            __DIR__ . '/../Config/jwt.php' => config_path('jwt.php'),
        ], 'config');

    }
}
