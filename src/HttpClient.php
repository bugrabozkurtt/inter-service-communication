<?php

namespace BugraBozkurt\InterServiceCommunication;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class HttpClient
{
    protected Client $client;

    public function __construct(array $config)
    {
        $this->client = new Client($config);
    }

    public function request(string $method, string $uri, array $options = []): array
    {
        try {
            $response = $this->client->request($method, $uri, $options);
            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            throw new \RuntimeException('HTTP Request failed: '.$e->getMessage());
        }
    }
}
