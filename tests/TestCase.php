<?php

namespace Codtail\AuthStrategy\Tests;


use Codtail\AuthStrategy\Tests\AuthStrategyTestingServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            AuthStrategyTestingServiceProvider::class
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        
    }
}
