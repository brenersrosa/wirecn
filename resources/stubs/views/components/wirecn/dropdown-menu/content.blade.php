@php
    $__dropdownPanelClass = cn(
        'fixed z-[100] flex min-h-0 max-h-[min(24rem,calc(100dvh-2rem))] min-w-32 w-max max-w-[calc(100vw-2rem)] flex-col overscroll-contain overflow-hidden rounded-lg border border-border bg-popover text-popover-foreground shadow-md ring-1 ring-foreground/10 dark:ring-border/60',
        $attributes->get('class'),
    );

    $__dropdownMenuViewport = new \Illuminate\View\ComponentAttributeBag([
        'role' => 'menu',
        'tabindex' => '-1',
        'class' => 'scroll-my-1 overflow-x-hidden p-1 outline-none',
    ]);
@endphp

<template x-teleport="body">
    <div
        wire:ignore
        x-ref="floating"
        x-show="open"
        x-cloak
        role="presentation"
        data-slot="dropdown-menu-content"
        data-testid="dropdown-menu"
        x-on:click="$event.stopPropagation(); closeOnMenuItemSelect($event)"
        x-on:transitionend="onFloatingPanelTransitionEnd($event)"
        x-transition.opacity.duration.100ms
        {{ $attributes->except('class')->class($__dropdownPanelClass) }}
    >
        <x-wirecn.scroll-area
            :viewport-attributes="$__dropdownMenuViewport"
            class="min-h-0 min-w-0 flex-1"
        >
            {{ $slot }}
        </x-wirecn.scroll-area>
    </div>
</template>
