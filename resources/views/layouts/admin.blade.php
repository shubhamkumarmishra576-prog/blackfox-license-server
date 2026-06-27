<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BlackFox License Server</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#0f172a] text-white font-sans">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col">

            {{-- Topbar --}}
            @include('layouts.topbar')

            {{-- Page Content --}}
            <main class="flex-1 p-8">
    @yield('content')
</main>

        </div>

    </div>

</body>
</html>