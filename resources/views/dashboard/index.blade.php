@extends('layouts.admin')

@section('content')

    <div class="grid grid-cols-4 gap-6">

        <x-blackfox.stat-card
    title="Total Clients"
    value="12"
    subtitle="7 Clients Online"
    icon="users"
/>

        <x-blackfox.card>
            <h3 class="text-slate-400 text-sm">Total Licenses</h3>

            <p class="text-4xl font-bold mt-3 text-white">
                150
            </p>

            <p class="text-yellow-400 mt-2">
                In Use : 45
            </p>
        </x-blackfox.card>

        <x-blackfox.card>
            <h3 class="text-slate-400 text-sm">Available Licenses</h3>

            <p class="text-4xl font-bold mt-3 text-white">
                105
            </p>

            <p class="text-green-400 mt-2">
                70% Available
            </p>
        </x-blackfox.card>

        <x-blackfox.card>
            <h3 class="text-slate-400 text-sm">Products</h3>

            <p class="text-4xl font-bold mt-3 text-white">
                6
            </p>

            <p class="text-green-400 mt-2">
                Active : 6
            </p>
        </x-blackfox.card>

    </div>

    <div class="grid grid-cols-12 gap-6 mt-6">

    <!-- License Usage -->
    <div class="col-span-6">

        <x-blackfox.card>

            <h2 class="text-xl font-semibold text-white mb-6">
                License Usage
            </h2>

            <div class="flex items-center justify-center h-80">

                <div class="w-56 h-56 rounded-full border-[18px] border-slate-700 relative flex items-center justify-center">

                    <div class="absolute inset-0 rounded-full border-[18px] border-blue-500"
                         style="clip-path: inset(0 50% 0 0);">
                    </div>

                    <div class="text-center">

                        <h2 class="text-5xl font-bold">
                            45
                        </h2>

                        <p class="text-slate-400">
                            In Use
                        </p>

                    </div>

                </div>

            </div>

        </x-blackfox.card>

    </div>

    <!-- Recent Activity -->

    <div class="col-span-6">

        <x-blackfox.card>

            <h2 class="text-xl font-semibold text-white mb-6">
                Recent License Activity
            </h2>

            <div class="space-y-5">

                <div class="flex justify-between">
                    <span>Client DESKTOP-7F2H3K5 checked out license</span>
                    <span class="text-slate-400">10:24 AM</span>
                </div>

                <div class="flex justify-between">
                    <span>Client LAPTOP-9X8J2D1 checked in license</span>
                    <span class="text-slate-400">10:23 AM</span>
                </div>

                <div class="flex justify-between">
                    <span>Client WORKSTATION-3G7P1Q checked out</span>
                    <span class="text-slate-400">10:22 AM</span>
                </div>

                <div class="flex justify-between">
                    <span>Client SERVER-1A2B3C checked in</span>
                    <span class="text-slate-400">10:21 AM</span>
                </div>

            </div>

        </x-blackfox.card>

    </div>

</div>

@endsection