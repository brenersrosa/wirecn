@props([
    'variant' => 'ghost',
    'size' => 'default',
])

<x-wirecn.button
    type="button"
    variant="{{ $variant }}"
    size="{{ $size }}"
    data-slot="dialog-close"
    x-on:click="close()"
    {{ $attributes }}
>
    {{ $slot }}
</x-wirecn.button>
