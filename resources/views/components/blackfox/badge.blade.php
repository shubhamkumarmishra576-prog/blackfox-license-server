@props([
    'color' => 'green',
])

<span
    {{ $attributes->merge([
        'class' => 'inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-'.$color.'-500/20 text-'.$color.'-400'
    ]) }}
>
    {{ $slot }}
</span>