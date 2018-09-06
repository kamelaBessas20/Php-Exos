<?php

use App\FileStorage;
use App\Logger;
use App\SqliteStorage;

class App{
    private $logger;
    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->logger = new Logger(new SqliteStorage());
    }

    public function run()
    {
        $this->logger->log('info', 'Bienvenue sur le site {user}!!!', ['user' => 'Nicolas']);
    }
}