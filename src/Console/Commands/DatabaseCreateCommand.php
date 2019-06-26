<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 09/01/19
 * Time: 8:29
 */

namespace Faizalami\LaravelMager\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PDO;
use PDOException;

class DatabaseCreateCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'db:create';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create database based from database configurations';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $driver = config('database.default');
        $databaseConfig = config('database.connections');
        $database = $databaseConfig[$driver]['database'];
        $host = $databaseConfig[$driver]['host'];
        $port = $databaseConfig[$driver]['port'];
        $username = $databaseConfig[$driver]['username'];
        $password = $databaseConfig[$driver]['password'];
        $charset = $databaseConfig[$driver]['charset'];
        $collation = $databaseConfig[$driver]['collation'];

        if (! $database) {
            $this->info('Skipping creation of database as env(DB_DATABASE) is empty');
            return;
        }

        try {
            $pdo = $this->connect($driver, $host, $port, $username, $password);

            $pdo->exec(sprintf(
                'CREATE DATABASE %s CHARACTER SET %s COLLATE %s;',
                $database,
                $charset,
                $collation
            ));

            $this->info(sprintf('Successfully created %s database', $database));
        } catch (PDOException $exception) {
            $this->error(sprintf('Failed to create %s database, %s', $database, $exception->getMessage()));
        }
    }

    public function connect($driver, $host, $port, $username, $password)
    {
        return new PDO(sprintf('%s:host=%s;port=%d;', $driver, $host, $port), $username, $password);
    }
}
