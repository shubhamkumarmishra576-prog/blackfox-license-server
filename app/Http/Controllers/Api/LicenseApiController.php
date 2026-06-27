<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LicenseApiController extends Controller
{
    public function activate(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Activation endpoint ready.'
        ]);
    }



    public function validateLicense(Request $request)
{
    $validated = $request->validate([
        'product_api_key' => 'required|string',
        'license_key'     => 'required|string',
        'hardware_id'     => 'required|string',
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Request received successfully.',
        'data' => [
            'product_api_key' => $validated['product_api_key'],
            'license_key'     => $validated['license_key'],
            'hardware_id'     => $validated['hardware_id'],
        ]
    ]);
}

    public function status(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Status endpoint ready.'
        ]);
    }
}