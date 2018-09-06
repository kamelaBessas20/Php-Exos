<?php

namespace App\Factory;


use App\Logger\Logger;

class LoggerFactory extends FactoryMethod
{

    protected function createLogger(string $type) : Logger
    {
        $qualifiedClass = "App\\Storage\\".ucfirst($type)."Storage";
        return new Logger(new $qualifiedClass);
    }
}