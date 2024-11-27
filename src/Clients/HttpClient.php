<?php

namespace BugraBozkurt\InterServiceCommunication\Clients;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class HttpClient
{
    public function __construct(protected string $baseUri, protected array $config = [])
    {}

    public function getPendingRequest(): PendingRequest
    {
        $headers = $this->config['headers'] ?? [];

        if (request()->bearerToken()) {
            $headers['Authorization'] = 'Bearer ' . request()->bearerToken();
        }

        return Http::baseUrl($this->baseUri)
            ->timeout($this->config['timeout'] ?? 5)
            ->withHeaders($headers);
    }

    /**
     * @throws ConnectionException
     */
    public function get(string $endpoint, array $query = []): Response
    {
        return $this->getPendingRequest()->get($endpoint, $query);
    }


    /**
     * @throws ConnectionException
     */
    public function post(string $endpoint, array $body = []): Response
    {
        return $this->getPendingRequest()->post($endpoint, $body);
    }


    public function withHeader(string $key, string $value): self
    {
        $this->config['headers'][$key] = $value;
        return $this;
    }
}
