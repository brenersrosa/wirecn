<div
    data-slot="sheet-overlay"
    x-show="open"
    x-cloak
    x-transition.opacity.duration.150ms
    x-bind:data-open="open ? '' : null"
    aria-hidden="true"
    x-on:click="close()"
    {{ $attributes->class(cn(
        'fixed left-0 top-0 z-50 h-[100vh] w-[100vw] max-h-[100vh] max-w-[100vw] overflow-hidden overscroll-contain bg-black/10 supports-[backdrop-filter]:backdrop-blur-xs',
        'data-open:animate-in data-open:fade-in-0 data-closed:animate-out data-closed:fade-out-0',
    )) }}
></div>
