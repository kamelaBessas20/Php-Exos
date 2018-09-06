<?php
namespace App;


class SqliteStorage implements StorageInterface
{
    private $bdd;

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

    public function storeLog(Log $log)
    {
        $this->insert($log);
    }
    private function insert(Log $log){
        $stmt = $this->bdd->prepare('INSERT INTO log(message, level, created) VALUES (:message, :level, :created)');
        $stmt->execute([
            'message' => $log->getMessage(),
            'level' => $log->getLevel(),
            'created' => $log->getDate()
        ]);
    }
}