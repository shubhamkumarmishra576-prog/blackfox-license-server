<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ApiKeyGenerator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $query = Product::query();

    if ($request->filled('search')) {

        $search = $request->search;

        $query->where('product_name', 'like', "%{$search}%")
              ->orWhere('product_code', 'like', "%{$search}%")
              ->orWhere('version', 'like', "%{$search}%");
    }

    $products = $query->latest()->get();

    return view('products.index', compact('products'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('products.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'product_name' => 'required|max:255',
        'version' => 'required|max:50',
        'license_type' => 'required',
        'max_activations' => 'required|integer|min:1',
    ]);

    $lastProduct = \App\Models\Product::latest('id')->first();

    $nextNumber = $lastProduct
        ? ((int) substr($lastProduct->product_code, 2)) + 1
        : 1;

    $productCode = 'PR' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

    \App\Models\Product::create([
        'product_code' => $productCode,
        'product_name' => $validated['product_name'],
        'version' => $validated['version'],
        'license_type' => $validated['license_type'],
        'max_activations' => $validated['max_activations'],
        'status' => 'active',
        'api_key' => ApiKeyGenerator::generate(),
    ]);

    return redirect()
        ->route('products.index')
        ->with('success', 'Product created successfully.');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
