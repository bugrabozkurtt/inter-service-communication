<?php

namespace BugraBozkurt\InterServiceCommunication\Enums;

use Illuminate\Support\Collection;

enum ServiceEndpointEnum: string
{
    case USER = '8080';

    case AUTH = '8081';
    case ORDER = '8082';
    case CAMPAIGN = '8083';

    public static function all(): Collection
    {
        return collect([
            'user' => self::USER,
            'order' => self::ORDER,
            'campaign' => self::CAMPAIGN,
            'auth' => self::AUTH,
        ]);
    }

    public function fullUri(): string
    {
        $baseUri = config('inter_service_communication.base_uri', 'http://localhost');
        return "{$baseUri}:{$this->value}";
    }
}
