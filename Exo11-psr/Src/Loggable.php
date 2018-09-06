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
        /**
         * Ici je ré-utilise les classes FileLogger et Sqlitelogger
         * Au final, j'instancie quand même un objet dans l'objet qui utilise mon trait ...
         * J'aurais pu créé 2 Trait, un pour File un pour Sqlite, qui reprendrais le contenu de mes classes.
         */
        $className = "App\\{$type}Logger";
        $this->logger = new $className;
    }

    public function log($level, $message)
    {
        $this->logger->log($level, $message);
    }
}