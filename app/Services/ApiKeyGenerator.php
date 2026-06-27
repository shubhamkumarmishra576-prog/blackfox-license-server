<?php

namespace App\Services;

class ApiKeyGenerator
{
    public static function generate(): string
    {
        return 'BF_PR_' . strtoupper(bin2hex(random_bytes(10)));
    }
}