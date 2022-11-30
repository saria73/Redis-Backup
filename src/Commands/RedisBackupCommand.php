<?php

namespace Saria73\RedisBackup\Commands;

use Illuminate\Console\Command;

class RedisBackupCommand extends Command
{
    public $signature = 'redis-backup';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
