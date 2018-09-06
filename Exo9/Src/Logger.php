<?php
namespace App;


abstract class Logger
{
    abstract public function log($level, $message);

    public function debug($message)
    {
        $this->log('debug', $message);
    }
    public function info($message)
    {
        $this->log('info', $message);
    }
    public function getTime()
    {
        $date = new \DateTime('now');
        return $date->format('d/m/Y H:i:s');
    }
}