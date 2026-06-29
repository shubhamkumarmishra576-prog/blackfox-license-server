@extends('layouts.admin')

@section('content')

<div class="flex items-center justify-between mb-8">

    <div>
        <h1 class="text-3xl font-bold text-white">
            Licenses
        </h1>

        <p class="text-slate-400 mt-1">
            Manage all software licenses.
        </p>
    </div>

    <a href="{{ route('licenses.create') }}"
       class="bg-blue-600 hover:bg-blue-700 px-5 py-3 rounded-xl font-medium">

        + Generate License

    </a>

</div>

<x-blackfox.card>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="border-b border-slate-700 text-slate-400">

                    <th class="text-left py-4">License Key</th>
                    <th class="text-left">Client</th>
                    <th class="text-left">Product</th>
                    <th class="text-left">Type</th>
                    <th class="text-left">Status</th>
                    <th class="text-center">Action</th>

                </tr>

            </thead>

            <tbody>

@if($licenses->count())

    @foreach($licenses as $license)

    <tr class="border-b border-slate-800">
    <td class="py-4">{{ $license->id }}</td>
    <td>{{ $license->license_key }}</td>
    <td>{{ $license->client->company_name }}</td>

    <td>{{ $license->product->product_name }}</td>
    <td>{{ $license->status }}</td>
    <td>-</td>
</tr>

    @endforeach

@else

<tr>

<td colspan="6" class="py-10 text-center text-slate-500">

No Licenses Available

</td>

</tr>

@endif

</tbody>

        </table>

    </div>

</x-blackfox.card>

@endsection