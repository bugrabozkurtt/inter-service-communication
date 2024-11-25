<?php

namespace BugraBozkurt\InterServiceCommunication;

use Illuminate\Support\ServiceProvider;

class InterServiceCommunicationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Paket konfigürasyonu
        $this->mergeConfigFrom(
            __DIR__.'/Config/inter_service_communication.php',
            'inter_service_communication'
        );

        // HttpClient Singleton
        $this->app->singleton(HttpClient::class, function () {
            return new HttpClient(config('inter_service_communication'));
        });
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/Config/inter_service_communication.php' => config_path('inter_service_communication.php'),
        ], 'config');
    }
}
