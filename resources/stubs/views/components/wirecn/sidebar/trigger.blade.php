<x-wirecn.button
    type="button"
    data-sidebar="trigger"
    data-slot="sidebar-trigger"
    variant="ghost"
    size="icon-sm"
    x-on:click="toggleSidebar()"
    {{ $attributes }}
>
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        <x-wirecn.phosphor-icon name="panel-left" class="size-4 rtl:scale-x-[-1]" />
        <span class="sr-only">{{ __('Alternar barra lateral') }}</span>
    @endif
</x-wirecn.button>
