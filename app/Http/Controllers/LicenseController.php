<?php

namespace App\Http\Controllers;

use App\Models\License;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $licenses = License::with(['client', 'product'])
        ->latest()
        ->get();

    return view('licenses.index', compact('licenses'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::orderBy('company_name')->get();
        $products = Product::orderBy('product_name')->get();

        return view('licenses.create', compact('clients', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'client_id' => 'required|exists:clients,id',
        'product_id' => 'required|exists:products,id',
        'license_type' => 'required|in:trial,subscription,perpetual',
        'activation_mode' => 'required|in:single,group',
        'allowed_computers' => 'required|integer|min:1',
        'expires_at' => 'nullable|date',
    ]);

    do {

        $licenseKey = 'BF-' . strtoupper(Str::random(4))
                    . '-' . strtoupper(Str::random(4))
                    . '-' . strtoupper(Str::random(4))
                    . '-' . strtoupper(Str::random(4));

    } while (License::where('license_key', $licenseKey)->exists());

    $license = License::create([

    'client_id' => $validated['client_id'],
    'product_id' => $validated['product_id'],
    'license_key' => $licenseKey,
    'license_type' => $validated['license_type'],
    'activation_mode' => $validated['activation_mode'],
    'allowed_computers' => $validated['allowed_computers'],
    'max_activations' => $validated['allowed_computers'],
    'used_activations' => 0,
    'expires_at' => $validated['expires_at'],
    'status' => 'active',

]);


    return redirect()
        ->route('licenses.index')
        ->with('success', 'License generated successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(License $license)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(License $license)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, License $license)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(License $license)
    {
        //
    }
}