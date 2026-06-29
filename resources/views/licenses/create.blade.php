@extends('layouts.admin')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-white">
        Generate License
    </h1>

    <p class="text-slate-400 mt-1">
        Create a new software license.
    </p>
</div>

<x-blackfox.card>

    <form action="{{ route('licenses.store') }}" method="POST">

        @csrf

        @include('licenses._form')

    </form>

</x-blackfox.card>

@endsection