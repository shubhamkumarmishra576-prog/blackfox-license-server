@props([
    'class' => '',
])

<div {{ $attributes->merge([
    'class' => 'bg-slate-800 border border-slate-700 rounded-2xl shadow-lg p-6 transition-all duration-300 hover:border-blue-500 hover:shadow-2xl '.$class
]) }}>
    {{ $slot }}
</div>