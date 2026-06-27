@extends('layouts.admin')

@section('content')

<div class="flex items-center justify-between mb-8">

    <div>

        <h1 class="text-3xl font-bold text-white">
            Add Client
        </h1>

        <p class="text-slate-400 mt-1">
            Register a new client in BlackFox License Server.
        </p>

    </div>

    <a href="{{ route('clients.index') }}"
       class="px-5 py-3 rounded-xl bg-slate-700 hover:bg-slate-600 transition">

        Back

    </a>

</div>

<x-blackfox.card>

   @include('clients._form')

</x-blackfox.card>

@endsection