<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 23/02/2018
 * Time: 12:46
 */

namespace App\Factory;


use App\Logger\Logger;
use App\Storage\SqliteStorage;

class SqliteLoggerFactory
{
    public function createLogger() : Logger
    {
        return new Logger(new SqliteStorage());
    }
}