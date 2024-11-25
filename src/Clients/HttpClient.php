<?php

namespace BugraBozkurt\InterServiceCommunication\Clients;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class HttpClient
{
    public function __construct(
        protected string $baseUri,
        protected array $config = []
    )
    {}

    public function getPendingRequest(array $extraHeaders = []): PendingRequest
    {
        $headers = array_merge(
            $this->config['headers'] ?? [],
            $extraHeaders
        );

        return Http::baseUrl($this->baseUri)
            ->timeout($this->config['timeout'] ?? 5)
            ->withHeaders($headers);
    }

    public function get(string $endpoint, array $query = [], array $headers = []): array
    {
        $response = $this->getPendingRequest($headers)->get($endpoint, $query);
        return $response->json();
    }

    public function post(string $endpoint, array $body = [], array $headers = []): array
    {
        $response = $this->getPendingRequest($headers)->post($endpoint, $body);
        return $response->json();
    }

    public function withHeader(string $key, string $value): self
    {
        $this->config['headers'][$key] = $value;
        return $this;
    }

}
