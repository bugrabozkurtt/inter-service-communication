<?php

use Illuminate\Auth\AuthenticationException;

if (!function_exists('customerId')) {

    /**
     * Authenticated kullanıcıdan ID tespit eder.
     *
     * @return int
     * @throws Illuminate\Auth\AuthenticationException
     */
    function customerId(): int
    {
        $user = auth()->user();

        if (!$user) {
            throw new AuthenticationException(__('Unauthenticated.'));
        }

        return $user->id;
    }
}
