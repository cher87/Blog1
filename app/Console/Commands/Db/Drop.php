<?php

namespace App\Console\Commands\Db;

use Illuminate\Console\Command;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;

/**
 * Class Drop
 *
 * @package App\Console\Commands\Db
 */
class Drop extends Command
{
    /** @type string The name and signature of the console command. */
    protected $signature = 'db:drop
                            {--force : Enforce an action}';

    /** @type string The console command description. */
    protected $description = 'Drops the database defined in config';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!app()->environment('local') && !$this->isForced()) {
            $this->error(
                "This action can't be performed in non-local environment.
                    Please use --force option if you really want to proceed."
            );
        }

        $this->dropDatabase();
    }

    /**
     * Drop the database
     */
    protected function dropDatabase()
    {
        /** @type Connection $connection */
        $conn = DB::connection();
        $dbname  = config('database.connections.mysql.database');

        $success = $conn->statement("DROP DATABASE IF EXISTS `{$dbname}`");
        if ($success) {
            $this->info("Database '{$dbname}' has been droped");
        } else {
            $this->error("Couldn't drop the database '{$dbname}'");
        }
    }

    /**
     * Check force mode
     *
     * @return bool
     */
    protected function isForced()
    {
        return (null !== $this->option('force')) ? true : false;
    }
}
