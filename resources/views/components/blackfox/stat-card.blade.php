@props([
    'title',
    'value',
    'subtitle' => '',
    'icon' => 'circle',
])

<div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 hover:border-blue-500 transition-all duration-300">

    <div class="flex items-start justify-between">

        <div>

            <p class="text-sm text-slate-400">
                {{ $title }}
            </p>

            <h2 class="text-4xl font-bold mt-3 text-white">
                {{ $value }}
            </h2>

            @if($subtitle)
                <p class="text-sm text-green-400 mt-3">
                    {{ $subtitle }}
                </p>
            @endif

        </div>

        <div class="w-12 h-12 rounded-xl bg-slate-700 flex items-center justify-center">

            <i data-lucide="{{ $icon }}" class="w-6 h-6"></i>

        </div>

    </div>

</div>