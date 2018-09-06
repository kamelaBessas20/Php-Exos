<?php
namespace App\Factory;


use App\Logger\Logger;
use App\Storage\FileStorage;

class FileLoggerFactory extends FactoryMethod
{
    public function createLogger($type) : Logger
    {
        return new Logger(new FileStorage());
    }
}