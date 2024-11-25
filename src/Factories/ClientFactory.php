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
        $endpoint = ServiceEndpointEnum::tryFrom($service);

        if (!$endpoint) {
            throw new ServiceNotFoundException("Service [{$service}] not found.");
        }

        return new HttpClient(
            $endpoint->fullUri(),
            [
                'timeout' => config('inter_service_communication.timeout', 5),
                'headers' => config('inter_service_communication.headers', []),
            ]
        );
    }
}
