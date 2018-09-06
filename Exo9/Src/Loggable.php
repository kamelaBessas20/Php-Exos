<?php
namespace App;

trait Loggable
{
    private $logger;

    /**
     * @param $type
     */
    public function setLogger($type)
    {
        $className = "App\\{$type}Logger";
        $this->logger = new $className;
    }

    public function log($level, $message)
    {
        $this->logger->log($level, $message);
    }
}