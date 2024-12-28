<?php

declare(strict_types=1);

namespace Scheel\PackageName\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Scheel\PackageName\PackageName
 */
final class PackageName extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Scheel\PackageName\PackageName::class;
    }
}
