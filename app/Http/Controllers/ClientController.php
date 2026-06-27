<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index(Request $request)
{
    $query = Client::query();

    if ($request->filled('search')) {

        $search = $request->search;

        $query->where('company_name', 'like', "%{$search}%")
              ->orWhere('owner_name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
    }

    $clients = $query->latest()->get();

    return view('clients.index', compact('clients'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('clients.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'company_name' => 'required|max:255',
        'owner_name'   => 'required|max:255',
        'email'        => 'required|email|unique:clients,email',
        'phone'        => 'nullable|max:20',
    ]);

    $lastClient = Client::latest('id')->first();

    $nextNumber = $lastClient
        ? ((int) substr($lastClient->client_code, 2)) + 1
        : 1;

    $clientCode = 'BF' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

    Client::create([

        'client_code' => $clientCode,

        'company_name' => $validated['company_name'],

        'owner_name' => $validated['owner_name'],

        'email' => $validated['email'],

        'phone' => $validated['phone'],

        'country' => 'India',

        'status' => 'active',

    ]);

    return redirect()
        ->route('clients.index')
        ->with('success', 'Client created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
{
    return view('clients.edit', compact('client'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
{
    $validated = $request->validate([
        'company_name' => 'required|max:255',
        'owner_name'   => 'required|max:255',
        'email'        => 'required|email|unique:clients,email,' . $client->id,
        'phone'        => 'nullable|max:20',
    ]);

    $client->update([
        'company_name' => $validated['company_name'],
        'owner_name'   => $validated['owner_name'],
        'email'        => $validated['email'],
        'phone'        => $validated['phone'],
    ]);

    return redirect()
        ->route('clients.index')
        ->with('success', 'Client updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
{
    $client->delete();

    return redirect()
        ->route('clients.index')
        ->with('success', 'Client deleted successfully.');
}

}