@props([
    'value' => '',
    'disabled' => false,
])

<x-wirecn.select.item :value="$value" :disabled="$disabled" {{ $attributes }}>
    {{ $slot }}
</x-wirecn.select.item>
