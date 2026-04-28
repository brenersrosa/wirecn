@php
    $__selectListboxViewport = new \Illuminate\View\ComponentAttributeBag([
        'x-bind:id' => 'listboxId',
        'role' => 'listbox',
        'tabindex' => '-1',
        'x-on:keydown.stop' => 'onListboxKeydown($event)',
        'x-on:scroll.passive' => 'updateScrollAffordances()',
        'class' => 'scroll-my-1 overflow-x-hidden p-1 outline-none',
    ]);
@endphp

<template x-teleport="body">
    <div
        x-ref="floatingPanel"
        x-show="panelOpen"
        x-cloak
        role="presentation"
        data-slot="select-content"
        x-on:click="$event.stopPropagation()"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        {{ $attributes->class(cn(
            'fixed z-[100] flex min-h-0 flex-col overscroll-contain overflow-hidden rounded-lg border border-border bg-popover text-popover-foreground shadow-md ring-1 ring-foreground/10 dark:ring-border/60',
        )) }}
    >
        <x-wirecn.select.scroll-up-button />
        <x-wirecn.scroll-area
            viewport-ref="viewport"
            :viewport-attributes="$__selectListboxViewport"
            class="min-h-0 min-w-0 flex-1"
        >
            {{ $slot }}
        </x-wirecn.scroll-area>
        <x-wirecn.select.scroll-down-button />
    </div>
</template>
