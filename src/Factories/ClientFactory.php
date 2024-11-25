<?php

namespace BugraBozkurt\InterServiceCommunication\Factories;

use BugraBozkurt\InterServiceCommunication\Clients\HttpClient;
use BugraBozkurt\InterServiceCommunication\Exceptions\ServiceNotFoundException;
use BugraBozkurt\InterServiceCommunication\Enums\ServiceEndpointEnum;

class ClientFactory
{

    /**
     * @param string $service
     * @return HttpClient
     * @throws ServiceNotFoundException
     */
    public static function make(string $service): HttpClient
    {
        $endpoint = ServiceEndpointEnum::all()->get($service);

        if (!$endpoint instanceof ServiceEndpointEnum) {
            throw new ServiceNotFoundException($service);
        }

        $config = config_path('inter_service_communication.');
        return new HttpClient(
            $endpoint->fullUri(),
            [
                'timeout' => $config['timeout'] ?? 5,
                'headers' => $config['headers'] ?? [],
            ]
        );
    }
}
