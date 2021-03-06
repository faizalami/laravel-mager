<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 09/01/19
 * Time: 8:29
 */

namespace Faizalami\LaravelMager\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Output\ConsoleOutput;
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
        $print = new ConsoleOutput();
        $driver = config('database.default');
        $databaseConfig = config('database.connections');
        $database = $databaseConfig[$driver]['database'];
        $host = $databaseConfig[$driver]['host'];
        $port = $databaseConfig[$driver]['port'];
        $username = $databaseConfig[$driver]['username'];
        $password = $databaseConfig[$driver]['password'];
        $charset = $databaseConfig[$driver]['charset'];
        $collation = $databaseConfig[$driver]['collation'];

        if (!ctype_alnum(str_replace('_', '', $database))) {
            $print->writeln('error database naming convention, use only letters, numbers, and underscores: ' . $database);
            Log::debug('error database naming convention, use only letters, numbers, and underscores: ' . $database);
            die('error database naming convention, use only letters, numbers, and underscores: ' . $database);
        }


        $print->writeln('Executing database : ' . $database);
        Log::debug('Executing database : ' . $database);

        if (! $database) {
            $print->writeln('Skipping creation of database as env(DB_DATABASE) is empty');
            Log::debug('Skipping creation of database as env(DB_DATABASE) is empty');
            return;
        }

        try {
            $pdo = $this->connect($driver, $host, $port, $username, $password);

            $pdo->exec(sprintf(
                'CREATE DATABASE %s CHARACTER SET %s COLLATE %s;',
                $database,
                $charset,
                $collation
            )) or $print->writeln(json_encode($pdo->errorInfo()));

            $print->writeln(sprintf('Successfully created %s database', $database));
            Log::debug(sprintf('Successfully created %s database', $database));
        } catch (PDOException $exception) {
            $print->writeln(sprintf('Failed to create %s database, %s', $database, $exception->getMessage()));
            Log::debug(sprintf('Failed to create %s database, %s', $database, $exception->getMessage()));
        }
    }

    public function connect($driver, $host, $port, $username, $password)
    {
        return new PDO(sprintf('%s:host=%s;port=%d;', $driver, $host, $port), $username, $password);
    }
}
