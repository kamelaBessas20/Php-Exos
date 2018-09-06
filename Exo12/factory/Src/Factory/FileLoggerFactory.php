<?php
namespace App\Factory;


use App\Logger\Logger;
use App\Storage\FileStorage;

class FileLoggerFactory
{
    public function createLogger() : Logger
    {
        return new Logger(new FileStorage());
    }
}