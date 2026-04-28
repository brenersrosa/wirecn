@props([
    'value' => '',
    'disabled' => false,
])

<div data-slot="accordion-item" {{ $attributes->class(cn('border-b border-border last:border-b-0')) }}>
    @isset($trigger)
        <x-wirecn.accordion.trigger :value="$value" :disabled="$disabled">
            {{ $trigger }}
        </x-wirecn.accordion.trigger>
    @endisset

    @isset($content)
        <x-wirecn.accordion.content :value="$value">
            {{ $content }}
        </x-wirecn.accordion.content>
    @endisset
</div>
