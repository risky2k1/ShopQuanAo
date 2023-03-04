<?php

use App\Enums\UserRoleEnum;

if (!function_exists('getRoleByKey')) {
    function getRoleByKey($key): string
    {
        return strtolower(UserRoleEnum::getKeys((int)$key)[0]);
    }
}
if (!function_exists('isAdmin')) {
    function isAdmin(): bool
    {
        return user() && user()->role === UserRoleEnum::ADMIN;
    }
}

