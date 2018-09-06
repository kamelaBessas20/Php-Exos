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
        $level = 'hggfhfg';

        $this->logger->{$level}('Bienvenue sur le site {user}!!!', ['user' => 'Nicolas']);

    }
}