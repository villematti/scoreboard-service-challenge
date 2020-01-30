<?php
declare(strict_types=1);

namespace App\Domain\Repositories;
use \App\Domain\Models\ScoreboardItem;
use \App\Domain\Repositories\ScoreboardItemRepository;

class ScoreboardItemRepositoryImpl implements ScoreboardItemRepository {
    private $dataRepo;
    
    function __construct()
    {
        $this->dataRepo = new \App\Data\Repositories\ScoreboardItemDataRepositoryImpl();
    }

    public function createScoreboardItem($name, $score): ScoreboardItem {
        $item = new ScoreboardItem($name, $score);
        $res = $this->dataRepo->saveScoreboardItem($item);

        if ($res) {
            return $item;
        } else {
            return false;
        }
    }

    public function getScoreboardItems(): Array {
        return $this->dataRepo->loadScoreboardItems();
    }

}