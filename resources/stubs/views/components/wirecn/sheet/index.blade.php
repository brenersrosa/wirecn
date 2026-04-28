@php
    $openBoundToLivewire = ! $attributes->whereStartsWith('wire:model')->isEmpty();
@endphp
@if ($openBoundToLivewire)
    <div
        data-slot="sheet"
        x-data="{
            open: @entangle($attributes->wire('model')),
            close() {
                this.open = false;
            },
            init() {
                if (this.open) {
                    window.wirecnLockModalScroll?.();
                }

                this.$watch('open', (v) => {
                    if (v) {
                        window.wirecnLockModalScroll?.();
                    } else {
                        window.wirecnUnlockModalScroll?.();
                    }
                });
            },
            destroy() {
                if (this.open) {
                    window.wirecnUnlockModalScroll?.();
                }
            },
        }"
        {{ $attributes->whereDoesntStartWith('wire:model')->class(cn('relative')) }}
    >
        {{ $slot }}
    </div>
@else
    <div x-data="uiDialog()" data-slot="sheet" {{ $attributes->class(cn('relative')) }}>
        {{ $slot }}
    </div>
@endif
