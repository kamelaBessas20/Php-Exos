<?php
namespace App;

use Psr\Log\AbstractLogger;
use Psr\Log\InvalidArgumentException;
use Psr\Log\LogLevel;

abstract class Logger extends AbstractLogger
{
    private $levelExistant;

    public function log($level, $message, array $context = array()){
        if (!defined(LogLevel::class .'::'. strtoupper($level)) ){
            throw new \InvalidArgumentException("Level $level non défini");
        }
    }
    public function __call($name, $arguments)
    {
        $this->log($name, $arguments[0], $arguments[1]);

//        throw new \BadMethodCallException("Level $name non défini");
    }
//    public static function __callStatic($name, $arguments)
//    {
//        self::log($name, $arguments[0], $arguments[1]);
////        throw new \BadMethodCallException("Level $name non défini");
//    }
    public function getTime()
    {
        $date = new \DateTime('now');
        return $date->format('d/m/Y H:i:s');
    }

    public function getConstantByReflection(){
        try {
            $level = new \ReflectionClass(LogLevel::class);
            $this->levelExistant = $level->getConstants();
        }
        catch(\ReflectionException $e){
            $e->getMessage();
        }
    }
    public function getLevelExistant(){
        return $this->levelExistant;
    }

    function interpolate($message, array $context = array())
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