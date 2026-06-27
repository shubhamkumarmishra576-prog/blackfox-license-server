<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LicenseValidationService;

class LicenseApiController extends Controller
{
    public function activate(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Activation endpoint ready.'
        ]);
    }



    public function validateLicense(
    Request $request,
    LicenseValidationService $service
)
{
    $validated = $request->validate([
        'product_api_key' => 'required|string',
        'license_key'     => 'required|string',
        'hardware_id'     => 'required|string',
    ]);

    return response()->json(

        $service->validate(
            $validated['product_api_key'],
            $validated['license_key'],
            $validated['hardware_id']
        )

    );
}

public function deactivate(Request $request)
{
    return response()->json([
        'success' => true,
        'message' => 'Deactivation endpoint ready.'
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