<?php
namespace App\Logger;

use App\Storage\StorageInterface;
use Psr\Log\AbstractLogger;
use Psr\Log\LogLevel;

class Logger extends AbstractLogger
{

    private $storage;

    /**
     * Logger constructor.
     * @param $storage
     */
    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }


    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function log($level, $message, array $context = array())
    {
        if (!defined(LogLevel::class .'::'. strtoupper($level)) ){
            throw new \InvalidArgumentException("Level $level non défini");
        }
        $log = new Log;
        $log->setLevel($level);
        $log->setMessage($this->interpolate($message, $context));
        $log->setDate($this->getTime());

        $this->storage->storeLog($log);

    }

    /**
     * @param mixed $storage
     */
    public function setStorage(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function getTime()
    {
        $date = new \DateTime('now');
        return $date->format('d/m/Y H:i:s');
    }

    private function interpolate($message, array $context = array())
    {
        // build a replacement array with braces around the context keys
        $replace = array();
        foreach ($context as $key => $val) {
            // check that the value can be casted to string
            if (!is_array($val) && (!is_object($val) || method_exists($val, '__toString'))) {
                $replace['{' . $key . '}'] = $val;
            }
        }

        // interpolate replacement values into the message and return
        return strtr($message, $replace);
    }
}