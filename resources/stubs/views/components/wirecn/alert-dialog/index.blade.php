@php
    $openBoundToLivewire = ! $attributes->whereStartsWith('wire:model')->isEmpty();
@endphp
@if ($openBoundToLivewire)
    <div
        data-slot="alert-dialog"
        x-data="{
            open: @entangle($attributes->wire('model')),
            close() {
                this.open = false;
            },
            init() {
                if (this.open) {
                    window.wirecnDialogScrollLock?.lock();
                }

                this.$watch('open', (v) => {
                    if (v) {
                        window.wirecnDialogScrollLock?.lock();
                    } else {
                        window.wirecnDialogScrollLock?.unlock();
                    }
                });
            },
            destroy() {
                if (this.open) {
                    window.wirecnDialogScrollLock?.unlock();
                }
            },
        }"
        {{ $attributes->whereDoesntStartWith('wire:model')->class(cn('relative')) }}
    >
        {{ $slot }}
    </div>
@else
    <div
        data-slot="alert-dialog"
        x-data="uiDialog()"
        {{ $attributes->class(cn('relative')) }}
    >
        {{ $slot }}
    </div>
@endif
