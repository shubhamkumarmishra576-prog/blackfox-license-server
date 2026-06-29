<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\License;
use App\Services\ActivationService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LicenseValidationService;

class LicenseApiController extends Controller
{
    public function activate(
    Request $request,
    ActivationService $activationService
) {

    $validated = $request->validate([

        'product_api_key' => 'required|string',

        'license_key'     => 'required|string',

        'hardware_id'     => 'required|string',

        'computer_name'   => 'required|string',

        'os_name'         => 'nullable|string',

        'os_version'      => 'nullable|string',

        'app_version'     => 'nullable|string',

    ]);

    $product = Product::where(
        'api_key',
        $validated['product_api_key']
    )->first();

    if (!$product) {

        return response()->json([

            'success' => false,

            'message' => 'Invalid Product API Key.'

        ],404);

    }

    $license = License::where(

        'license_key',
        $validated['license_key']

    )
    ->where('product_id',$product->id)
    ->first();

    if (!$license) {

        return response()->json([

            'success' => false,

            'message' => 'License not found.'

        ],404);

    }

    $result = $activationService->activate(

        $license,

        $validated

    );

    return response()->json($result);

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