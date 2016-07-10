<?php

namespace App\Console\Commands\Db;

use Illuminate\Console\Command;

/**
 * Class Create
 *
 * @package App\Console\Commands\Database
 */
class Create extends Command
{
    /** @type string The name and signature of the console command. */
    protected $signature = 'db:create';

    /** @type string The console command description. */
    protected $description = 'Creates the database defined in config';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->createDatabase();
    }

    /**
     * Drop the database
     */
    protected function createDatabase()
    {
        $driver = config('database.connections.mysql.driver');
        $dbhost = config('database.connections.mysql.host');
        $dbuser = config('database.connections.mysql.username');
        $dbpass = config('database.connections.mysql.password');
        $dbname = config('database.connections.mysql.database');
        $cnames = config('database.connections.mysql.charset');

        /** @type \PDO $conn */
        $conn = new \PDO(
            "{$driver}:host={$dbhost}",
            $dbuser,
            $dbpass,
            [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES '{$cnames}'"]
        );
        /** @type \PDOStatement $statement */
        $stmt = $conn->query("CREATE DATABASE `{$dbname}`");
        if ($stmt) {
            $this->info("Database '{$dbname}' has been created");
        } else {
            $this->error("Couldn't create the database '{$dbname}'. Error: {$stmt->errorInfo()}");
        }
    }
}
