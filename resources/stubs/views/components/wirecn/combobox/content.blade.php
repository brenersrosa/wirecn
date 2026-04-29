@php
    $__combPanelClass = cn(
        'fixed z-[100] flex min-h-0 max-h-[min(24rem,calc(100dvh-2rem))] min-w-[9rem] flex-col overscroll-contain overflow-hidden rounded-lg border border-border bg-popover text-popover-foreground shadow-md ring-1 ring-foreground/10 dark:ring-border/60',
        $attributes->get('class'),
    );
@endphp

<template x-teleport="body">
    <div
        wire:ignore
        x-ref="floatingPanel"
        x-show="open"
        x-cloak
        role="presentation"
        data-slot="combobox-content"
        x-on:click="$event.stopPropagation()"
        x-on:transitionend="onFloatingPanelTransitionEnd($event)"
        x-transition.opacity.duration.100ms
        {{ $attributes->except('class')->class($__combPanelClass) }}
    >
        {{ $slot }}
    </div>
</template>
