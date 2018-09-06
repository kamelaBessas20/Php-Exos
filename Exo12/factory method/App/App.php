<?php

use App\Factory\LoggerFactory;

class App{
    private $logger;
    /**
     * App constructor.
     *
     */
    public function __construct()
    {
        $this->logger = (new LoggerFactory())->create('file');
        var_dump($this->logger);
    }

    public function run()
    {
        $this->logger->warning('Bienvenue sur le site {user}!!!', ['user' => 'Nicolas']);
    }
}