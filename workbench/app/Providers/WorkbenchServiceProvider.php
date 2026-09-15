<?php

namespace App\Providers;

use Heritage\Contracts\Http\Kernel as HttpKernel;
use Heritage\Http\Middleware\TrustProxies;
use Heritage\Support\Facades\Route;
use Heritage\Support\ServiceProvider;
use Ugarit\Sentinel\Http\Middleware\SentinelMiddleware;

use function Orchestra\Testbench\ugarit_version_compare;

class WorkbenchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        if (ugarit_version_compare('11.0.0', '<')) {
            $this->callAfterResolving(HttpKernel::class, function ($kernel) {
                $kernel->prependMiddleware(TrustProxies::class);
            });
        }

        Route::aliasMiddleware('sentinel', SentinelMiddleware::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
