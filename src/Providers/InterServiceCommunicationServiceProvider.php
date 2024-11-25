<?php

namespace BugraBozkurt\InterServiceCommunication\Providers;

use Illuminate\Support\ServiceProvider;
use BugraBozkurt\InterServiceCommunication\Factories\ClientFactory;
use BugraBozkurt\InterServiceCommunication\Enums\ServiceEndpointEnum;

class InterServiceCommunicationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Enum'dan tüm servisleri döndür ve register et
        foreach (ServiceEndpointEnum::all() as $service) {
            $this->app->singleton("{$service->value}.client", function () use ($service) {
                return ClientFactory::make($service->value);
            });
        }
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/Config/inter_service_communication.php' => config_path('inter_service_communication.php'),
        ], 'config');
    }
}
