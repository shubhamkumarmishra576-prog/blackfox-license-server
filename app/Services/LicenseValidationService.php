<?php

namespace App\Services;

use App\Models\License;
use App\Models\Product;

class LicenseValidationService
{
    public function validate(
        string $productApiKey,
        string $licenseKey,
        string $hardwareId
    ): array {

        // Check Product
        $product = Product::where('api_key', $productApiKey)
            ->where('status', 'active')
            ->first();

        if (!$product) {
            return [
                'success' => false,
                'message' => 'Invalid Product API Key.'
            ];
        }

        // Check License
        $license = License::where('license_key', $licenseKey)
            ->where('product_id', $product->id)
            ->first();

        if (!$license) {
            return [
                'success' => false,
                'message' => 'Invalid License Key.'
            ];
        }

        if ($license->status !== 'active') {
            return [
                'success' => false,
                'message' => 'License is not active.'
            ];
        }

        if (
            $license->expires_at &&
            now()->greaterThan($license->expires_at)
        ) {
            return [
                'success' => false,
                'message' => 'License expired.'
            ];
        }

        return [
            'success' => true,
            'message' => 'License validated successfully.',
            'license' => $license,
            'product' => $product,
        ];
    }
}