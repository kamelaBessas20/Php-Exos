<?php

use App\Factory\FileLoggerFactory;
use App\Factory\SqliteLoggerFactory;

class App{
    private $logger;
    /**
     * App constructor.
     *
     */
    public function __construct()
    {
        $this->logger = (new SqliteLoggerFactory())->createLogger();
        var_dump($this->logger);
    }

    public function run()
    {
        $this->logger->log('info', 'Bienvenue sur le site {user}!!!', ['user' => 'Nicolas']);
    }
}