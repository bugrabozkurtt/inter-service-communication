<?php

namespace BugraBozkurt\InterServiceCommunication\Clients;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class HttpClient
{
    protected string $baseUri;
    protected array $config;

    public function __construct(string $baseUri, array $config = [])
    {
        $this->baseUri = $baseUri;
        $this->config = $config;
    }

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

    public function get(string $endpoint, array $query = []): array
    {
        $response = $this->getPendingRequest()->get($endpoint, $query);
        return $response->json();
    }

    public function post(string $endpoint, array $body = []): array
    {
        $response = $this->getPendingRequest()->post($endpoint, $body);
        return $response->json();
    }

    public function withHeader(string $key, string $value): self
    {
        $this->config['headers'][$key] = $value;
        return $this;
    }
}
