<?php

namespace Ugarit\Sentinel;

use Heritage\Support\Facades\Facade;

/**
 * @method static string|null getDefaultDriver()
 * @method static mixed driverOrFallback(string|null $driver)
 * @method static mixed driver(string|null $driver = null)
 * @method static \Ugarit\Sentinel\SentinelManager extend(string $driver, \Closure $callback)
 * @method static array getDrivers()
 * @method static \Heritage\Contracts\Container\Container getContainer()
 * @method static \Ugarit\Sentinel\SentinelManager setContainer(\Heritage\Contracts\Container\Container $container)
 * @method static \Ugarit\Sentinel\SentinelManager forgetDrivers()
 *
 * @see \Ugarit\Sentinel\SentinelManager
 */
class Sentinel extends Facade
{
    /** {@inheritdoc} */
    protected static function getFacadeAccessor()
    {
        return SentinelManager::class;
    }
}
