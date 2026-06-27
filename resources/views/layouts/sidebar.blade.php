<aside class="w-72 bg-[#111827] border-r border-slate-700 flex flex-col">

    <!-- Logo -->
    <div class="h-20 flex items-center px-6 border-b border-slate-700">

        <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center">

            <span class="text-xl font-bold text-white">
                B
            </span>

        </div>

        <div class="ml-3">

            <h2 class="text-lg font-bold text-white">
                BlackFox
            </h2>

            <p class="text-xs text-slate-400">
                License Server
            </p>

        </div>

    </div>

    <!-- Menu -->

    <nav class="flex-1 px-4 py-6">

        <ul class="space-y-2">

            <li>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl bg-blue-600 text-white font-medium">

                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>

                    Dashboard

                </a>
            </li>

            <li>
    <a href="{{ route('clients.index') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800 transition">

        <i data-lucide="users" class="w-5 h-5"></i>

        Clients

    </a>
</li>

            <li>
                <a href="{{ route('products.index') }}"
   class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800 transition">

    <i data-lucide="package" class="w-5 h-5"></i>

    Products

</a>
            </li>

            <li>
                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800 transition">

                    <i data-lucide="key-round" class="w-5 h-5"></i>

                    Licenses

                </a>
            </li>

            <li>
                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800 transition">

                    <i data-lucide="monitor" class="w-5 h-5"></i>

                    Computers

                </a>
            </li>

            <li>
                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800 transition">

                    <i data-lucide="inbox" class="w-5 h-5"></i>

                    Requests

                </a>
            </li>

            <li>
                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800 transition">

                    <i data-lucide="wallet" class="w-5 h-5"></i>

                    Payments

                </a>
            </li>

            <li>
                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800 transition">

                    <i data-lucide="settings" class="w-5 h-5"></i>

                    Settings

                </a>
            </li>

        </ul>

    </nav>

    <!-- Footer -->

    <div class="p-4 border-t border-slate-700">

        <div class="rounded-xl bg-slate-800 p-4">

            <div class="flex items-center justify-between">

                <span class="text-sm text-slate-400">
                    Server
                </span>

                <span class="text-green-400 font-semibold">
                    Running
                </span>

            </div>

        </div>

    </div>

</aside>