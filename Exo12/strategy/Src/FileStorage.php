<?php
namespace App;


class FileStorage implements StorageInterface
{
    private $filename;

    public function __construct($filename = 'log.txt')
    {
        $this->filename = $filename;
    }

    public function storeLog(Log $log)
    {
        file_put_contents($this->filename, $this->formatLog($log), FILE_APPEND);
    }

    public function formatLog(Log $log)
    {
        return "[{$log->getDate()}] [{$log->getLevel()}] {$log->getMessage()}". PHP_EOL;
    }
}