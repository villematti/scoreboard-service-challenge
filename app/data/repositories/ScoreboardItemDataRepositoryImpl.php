<?php
declare(strict_types=1);

namespace App\Data\Repositories;
use \App\Data\Repositories\ScoreboardItemDataRepository;

class ScoreboardItemDataRepositoryImpl implements ScoreboardItemDataRepository {
    private $pdo;
    private $sqlite;

    function __construct()
    {
        $this->sqlite = new \App\Data\Database\SQLiteConnection();
        $this->pdo = $this->sqlite->connect();
    }

    public function saveScoreboardItem($item): bool {
        return $this->sqlite->saveItem($item);
    }

    public function loadScoreboardItems(): Array {
        $res = $this->sqlite->getItems();
        $data = [];
        foreach($res as $r) {
            $data[] = array("name" => $r['name'], "score" => $r['score']);
        }
        return $data;
    }
}