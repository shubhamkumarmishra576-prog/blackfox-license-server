@props([
    'type' => 'text',
])

<input
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => 'w-full rounded-xl border border-slate-700 bg-slate-800 text-white px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none'
    ]) }}
>