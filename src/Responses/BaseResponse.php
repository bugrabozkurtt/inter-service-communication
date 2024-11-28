<?php

namespace BugraBozkurt\InterServiceCommunication\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseResponse extends JsonResource
{
    public static function success($data = [], $message = null, $code = 200): JsonResponse
    {
        $response = [
            'success' => true,
        ];

        if (!empty($message)) {
            $response['message'] = $message;
        }

        if (!empty($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }

    public static function error($message = null, $code = 400, $data = []): JsonResponse
    {
        $response = [
            'success' => false,
        ];

        if (!empty($message)) {
            $response['message'] = $message;
        }

        if (!empty($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }
}
