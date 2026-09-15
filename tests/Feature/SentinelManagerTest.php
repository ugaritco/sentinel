<?php

namespace Tests\Feature;

use Ugarit\Sentinel\Drivers\Driver;
use Ugarit\Sentinel\Drivers\Ugarit;
use Ugarit\Sentinel\SentinelManager;
use Tests\TestCase;

class SentinelManagerTest extends TestCase
{
    public function test_it_can_be_resolved()
    {
        $manager = app(SentinelManager::class);

        $this->assertInstanceOf(SentinelManager::class, $manager);
        $this->assertSame('ugarit', $manager->getDefaultDriver());

        tap($manager->driver(), function ($driver) use ($manager) {
            $this->assertInstanceOf(Ugarit::class, $driver);
            $this->assertInstanceOf(Driver::class, $driver);

            $this->assertSame($driver, $manager->driver('ugarit'));
        });
    }

    public function test_it_can_fallback_to_default_driver()
    {
        $manager = app(SentinelManager::class);

        $this->assertInstanceOf(Ugarit::class, $manager->driverOrFallback('foobar'));
    }
}
