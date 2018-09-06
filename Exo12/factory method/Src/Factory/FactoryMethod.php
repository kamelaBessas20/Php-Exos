<?php
namespace App\Factory;


use App\Logger\Logger;

abstract class FactoryMethod
{
    public function create($type): Logger
    {
        return $this->createLogger($type);
    }
    abstract protected function createLogger(string $type) : Logger;

}