<?php

namespace Ugarit\Sentinel;

use Heritage\Support\Manager;
use Ugarit\Sentinel\Drivers\Ugarit;

class SentinelManager extends Manager
{
    /**
     * Create default "ugarit" driver.
     *
     * @return Ugarit
     */
    protected function createUgaritDriver()
    {
        /** @phpstan-ignore argument.type */
        return new Ugarit(fn () => $this->getContainer());
    }

    /**
     * Get the default driver name.
     *
     * @return string|null
     */
    public function getDefaultDriver()
    {
        return 'ugarit';
    }

    /**
     * Get a driver instance or fallback to default
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public function driverOrFallback(?string $driver)
    {
        return rescue(function () use ($driver) {
            return $this->driver($driver);
        }, value(function () {
            return $this->driver();
        }), false);
    }
}
