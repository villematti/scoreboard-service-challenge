<?php
namespace App\Data\Database;
 
use \App\Domain\Models\ScoreboardItem;
/**
 * SQLite connnection
 */
class SQLiteConnection {
    /**
     * PDO instance
     * @var type 
     */
    private $pdo;
 
    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return \PDO
     */
    public function connect() {
        if ($this->pdo == null) {
            $this->pdo = new \PDO("sqlite:db/phpsqlite.db");
        }

        $this->databaseSchema();
        return $this->pdo;
    }

    public function saveItem(ScoreboardItem $item) {
        $name = $item->getName();
        $score = $item->getScore();
        try {
            $insert = \sprintf("INSERT INTO scores(name,score) VALUES('%s','%s');", \htmlentities($name), $score);
            $stmt = $this->pdo->prepare($insert);
            return $stmt->execute();
        } catch(\PDOException $e) {
            print_r("Unable to insert: ", $e);
            return false;
        }
    }

    public function getItems() {
        try {
            $query = "SELECT * FROM scores";
            return $this->pdo->query($query);
        } catch(\PDOException $e) {
            print_r("Unable to insert: ", $e);
            return false;
        }
    }

    private function databaseSchema() {
        try{
            $this->pdo->exec("CREATE TABLE IF NOT EXISTS scores (
                id INTEGER PRIMARY KEY, 
                name TEXT, 
                score INTEGER)");
        } catch(\PDOException $e) {
            print_r($e);
        }
    }
}