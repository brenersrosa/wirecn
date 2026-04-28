@props([
    'name',
    'variant' => null,
    'weight' => null,
])

<x-wirecn.phosphor-icon
    :name="$name"
    :variant="$variant"
    :weight="$weight ?? 'regular'"
    {{ $attributes }}
/>
