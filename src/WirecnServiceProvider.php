<?php

declare(strict_types=1);

namespace Wirecn\Laravel;

use Illuminate\Support\ServiceProvider;

final class WirecnServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../resources/stubs/views/components/wirecn' => resource_path('views/components/wirecn'),
        ], 'wirecn-views');

        $this->publishes([
            __DIR__.'/../resources/stubs/js' => resource_path('js/wirecn'),
        ], 'wirecn-js');
    }
}
