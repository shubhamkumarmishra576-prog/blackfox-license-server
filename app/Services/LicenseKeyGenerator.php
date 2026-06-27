<?php

namespace App\Services;

class LicenseKeyGenerator
{
    public static function generate(string $productCode): string
    {
        return sprintf(
            'BF-%s-%s-%s-%s',
            strtoupper($productCode),
            self::randomBlock(),
            self::randomBlock(),
            self::randomBlock()
        );
    }

    protected static function randomBlock(): string
    {
        return strtoupper(substr(bin2hex(random_bytes(3)), 0, 4));
    }
}