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
        $serviceName = ServiceEndpointEnum::tryFrom($service);

        if (!$serviceName) {
            throw new ServiceNotFoundException("Service [{$service}] not found.");
        }


        return new HttpClient(
            baseUri: config('inter_service_communication.base_path', 'http://localhost') . ':' . $serviceName->port(),
            config: [
                'timeout' => config('inter_service_communication.timeout', 5),
                'headers' => config('inter_service_communication.headers', []),
            ]
        );
    }
}
