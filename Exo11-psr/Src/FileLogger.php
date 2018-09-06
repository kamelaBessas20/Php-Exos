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


    public function log($level, $message, array $context = array())
    {
        try{
            /**
             * Ici je rappel le parent qui contient le test sur le level
             * juste pour vous  sur l'existance de parent::
             */
            parent::log($level, $message, $context);
            file_put_contents($this->filename, $this->formatLog($level, $this->interpolate($message, $context)), FILE_APPEND);
        }catch(\Exception $e){
            var_dump($e);
        }
    }

    public function formatLog($level, $message)
    {
        return "[{$this->getTime()}] [{$level}] {$message}". PHP_EOL;
    }
}