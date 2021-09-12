<?php

namespace CodeDistortion\LaravelHelpers\Test;

use CodeDistortion\LaravelHelpers\StringableServiceProvider;
use CodeDistortion\LaravelHelpers\StrServiceProvider;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as Orchestra;

/**
 * TestCase for Laravel integration tests.
 */
abstract class IntegrationTestCase extends Orchestra
{
    /**
     * Tell Laravel which providers to register.
     *
     * @param Application $app The Laravel App.
     * @return string[]
     */
    protected function getPackageProviders($app): array
    {
        return [
            StringableServiceProvider::class,
            StrServiceProvider::class,
        ];
    }
}
