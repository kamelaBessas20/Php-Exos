<?php
use App\FileLogger;
use App\Loggable;
use App\SqliteLogger;

class App{
    use Loggable;
    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->setLogger('File');
    }

    public function run()
    {
//        $this->logger->log('error', 'Bienvenue sur le site !!!');
        $this->log('error', 'Bienvenue sur le site !!!');
    }
}