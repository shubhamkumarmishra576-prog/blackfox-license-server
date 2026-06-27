@extends('layouts.admin')

@section('content')

@if(session('success'))

    <div class="mb-6 rounded-xl bg-green-500/10 border border-green-500 p-4 text-green-400">

        {{ session('success') }}

    </div>

@endif

<div class="flex items-center justify-between mb-8">
    <div class="mb-6">

    <form action="{{ route('clients.index') }}" method="GET">

        <div class="flex gap-4">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search by Company, Owner or Email..."
                class="flex-1 rounded-xl bg-slate-900 border border-slate-700 px-4 py-3 text-white focus:border-blue-500 focus:outline-none">

            <button
                type="submit"
                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-xl font-medium">

                Search

            </button>

        </div>

    </form>

</div>

    <div>

        <h1 class="text-3xl font-bold text-white">
            Clients
        </h1>

        <p class="text-slate-400 mt-1">
            Manage all registered clients.
        </p>

    </div>

    
         <a href="{{ route('clients.create') }}"
   class="bg-blue-600 hover:bg-blue-700 px-5 py-3 rounded-xl font-medium">

    + Add Client

</a>
    

</div>

<x-blackfox.card>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="border-b border-slate-700 text-slate-400">

                    <th class="text-left py-4">Code</th>

                    <th class="text-left">Company</th>

                    <th class="text-left">Owner</th>

                    <th class="text-left">Email</th>

                    <th class="text-left">Phone</th>

                    <th class="text-left">Status</th>

                    <th class="text-center">Action</th>

                </tr>

            </thead>

            <tbody>

    @forelse($clients as $client)

        <tr class="border-b border-slate-700 hover:bg-slate-800/40">

            <td class="py-4">
                {{ $client->client_code }}
            </td>

            <td>
                {{ $client->company_name }}
            </td>

            <td>
                {{ $client->owner_name }}
            </td>

            <td>
                {{ $client->email }}
            </td>

            <td>
                {{ $client->phone }}
            </td>

            <td>

                <span class="px-3 py-1 rounded-lg bg-green-500/20 text-green-400 text-sm">

                    {{ ucfirst($client->status) }}

                </span>

            </td>

            <td class="text-center">

    <div class="flex justify-center gap-4">

        <a href="{{ route('clients.edit', $client) }}"
           class="text-blue-400 hover:text-blue-300">

            Edit

        </a>

        <form
            action="{{ route('clients.destroy', $client) }}"
            method="POST"
            onsubmit="return confirm('Delete this client?')">

            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="text-red-400 hover:text-red-300">

                Delete

            </button>

        </form>

    </div>

</td>

        </tr>

    @empty

        <tr>

            <td colspan="7" class="py-10 text-center text-slate-500">

                No Clients Available

            </td>

        </tr>

    @endforelse

</tbody>

        </table>

    </div>

</x-blackfox.card>

@endsection