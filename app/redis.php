<?php

namespace App;

class Redis
{
    /**
     * Execute the job
     *
     * @return void
     */
    public function handle()
    {
        $redis = new \Redis();
        $redis->connect(config('database.redis.default.host'), config('database.redis.default.port'));

        $this->backUp(connection: $redis);
    }

    /**
     * Take backup from all Redis databases
     *
     * @param  \Redis  $connection
     * @return void
     */
    private function backUp(\Redis $connection): void
    {
        for ($i = 0; $i < 16; $i++) {
            $this->saveData(connection: $connection, db_number: $i);
        }
    }

    /**
     * Read Redis data from given DB and write them to a custom file
     *
     * @param  \Redis  $connection
     * @param  int  $db_number
     * @return bool
     */
    public function saveData(\Redis $connection, int $db_number): bool
    {
        $backup_file = fopen(config('backup.redis-backup-storage-direction').'backup-db-'.strval($db_number).'.txt', 'w');

        if (! $backup_file) {
            return false;
        }

        $connection->select($db_number);
        $dbKeys = $connection->keys('*');

        foreach ($dbKeys as $key) {
            $value = $connection->get($key);
            $line = $key.' : '.$value."\n";
            fwrite($backup_file, $line);
        }

        fclose($backup_file);

        return true;
    }
}
