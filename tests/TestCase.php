<?php

declare(strict_types=1);

namespace Scheel\PackageName\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Scheel\PackageName\PackageNameServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName): string => 'Scheel\\PackageName\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_skeleton_table.php.stub';
        $migration->up();
        */
    }

    protected function getPackageProviders($app)
    {
        return [
            PackageNameServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'PackageName' => \Scheel\PackageName\Facades\PackageName::class,
        ];
    }
}
