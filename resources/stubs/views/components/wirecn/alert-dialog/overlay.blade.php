<div
    data-slot="alert-dialog-overlay"
    x-show="open"
    x-transition:enter="transition ease-out duration-100"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    aria-hidden="true"
    {{ $attributes->class(cn(
        'fixed left-0 top-0 isolate z-50 h-[100vh] w-[100vw] max-h-[100vh] max-w-[100vw] overflow-hidden overscroll-contain bg-black/10 supports-backdrop-filter:backdrop-blur-sm',
    )) }}
></div>
