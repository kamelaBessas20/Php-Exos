<?php
namespace App;


class SqliteLogger extends Logger
{
    private $bdd;

    /**
     * SqliteLogger constructor.
     */
    public function __construct()
    {
        try {
            $this->bdd = new \PDO('sqlite:db.sqlite');
            $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->createTable();
        }
        catch (\PDOException $e){
            echo $e->getMessage();
        }
    }
    private function createTable(){
        $this->bdd->query('CREATE TABLE IF NOT EXISTS log (
            id  INTEGER PRIMARY KEY AUTOINCREMENT,
            level VARCHAR (50),
            message VARCHAR (250),
            created DATETIME
        )');
    }
    private function insert($level, $message){
        $stmt = $this->bdd->prepare('INSERT INTO log(message, level, created) VALUES (:message, :level, :created)');
        $stmt->execute([
            'message' => $message,
            'level' => $level,
            'created' => $this->getTime()
        ]);
        $this->getLogs();
    }
    public function getLogs()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM log');
        $stmt->execute();
        var_dump($stmt->fetchAll());
    }
    public function log($level, $message)
    {
        $this->insert($level, $message);
    }

}