<?php

namespace BugraBozkurt\InterServiceCommunication\Enums;

use Illuminate\Support\Collection;

enum ServiceEndpointEnum: string
{
    case USER = '8080';
    case ORDER = '8082';
    case CAMPAIGN = '8083';

    public static function all(): Collection
    {
        return collect([
            'user' => self::USER,
            'order' => self::ORDER,
            'campaign' => self::CAMPAIGN,
        ]);
    }

    public function fullUri(): string
    {
        return config('inter_service_communication.base_uri') . ':' . $this->value;
    }
}