<?php
namespace App;


class FileLogger extends Logger
{
    private $filename;

    /**
     * FileLogger constructor.
     * @param $filename
     */
    public function __construct($filename = 'log.txt')
    {
        $this->filename = $filename;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }


    public function log($level, $message)
    {
        file_put_contents($this->filename, $this->formatLog($level, $message), FILE_APPEND);
    }

    public function formatLog($level, $message)
    {
        return "[{$this->getTime()}] [{$level}] {$message}". PHP_EOL;
    }
}