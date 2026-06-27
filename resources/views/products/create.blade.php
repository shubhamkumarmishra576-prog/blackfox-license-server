@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold text-white mb-6">

    Add Product

</h1>

<x-blackfox.card>

    @include('products._form')

</x-blackfox.card>

@endsection