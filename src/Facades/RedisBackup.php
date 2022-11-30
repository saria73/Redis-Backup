<?php

namespace Saria73\RedisBackup\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Saria73\RedisBackup\RedisBackup
 */
class RedisBackup extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Saria73\RedisBackup\RedisBackup::class;
    }
}
