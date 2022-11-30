<?php

namespace Saria73\RedisBackup;

use Saria73\RedisBackup\Commands\RedisBackupCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class RedisBackupServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('redis-backup')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_redis-backup_table')
            ->hasCommand(RedisBackupCommand::class);
    }
}
