@extends('layouts.admin')

@section('content')

@if(session('success'))

<div class="mb-6 rounded-xl bg-green-500/10 border border-green-500 p-4 text-green-400">

    {{ session('success') }}

</div>

@endif

<div class="flex items-center justify-between mb-8">

    <div>

        <h1 class="text-3xl font-bold text-white">
            Products
        </h1>

        <p class="text-slate-400 mt-1">
            Manage all software products.
        </p>

    </div>

    <a href="{{ route('products.create') }}"
       class="bg-blue-600 hover:bg-blue-700 px-5 py-3 rounded-xl font-medium">

        + Add Product

    </a>

</div>
<div class="mb-6">

    <form action="{{ route('products.index') }}" method="GET">

        <div class="flex gap-4">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search Product..."
                class="flex-1 rounded-xl bg-slate-900 border border-slate-700 px-4 py-3 text-white focus:border-blue-500 focus:outline-none">

            <button
                type="submit"
                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-xl">

                Search

            </button>

        </div>

    </form>

</div>

<x-blackfox.card>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="border-b border-slate-700 text-slate-400">

                    <th class="text-left py-4">Code</th>
                    <th class="text-left">Product</th>
                    <th class="text-left">Version</th>
                    <th class="text-left">License</th>
                    <th class="text-left">Status</th>
                    <th class="text-center">Action</th>

                </tr>

            </thead>

            <tbody>

            @forelse($products as $product)

                <tr class="border-b border-slate-700">

                    <td class="py-4">
                        {{ $product->product_code }}
                    </td>

                    <td>
                        {{ $product->product_name }}
                    </td>

                    <td>
                        {{ $product->version }}
                    </td>

                    <td>
                        {{ ucfirst($product->license_type) }}
                    </td>

                    <td>

                        <span class="px-3 py-1 rounded-lg bg-green-500/20 text-green-400">

                            {{ ucfirst($product->status) }}

                        </span>

                    </td>

                    <td class="text-center">

                        Edit

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="py-10 text-center text-slate-500">

                        No Products Available

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</x-blackfox.card>

@endsection