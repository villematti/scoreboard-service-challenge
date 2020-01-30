<?php

namespace App\Presentation\Views;
use \App\Domain\Repositories\ScoreboardItemRepositoryImpl;

class ScoreboardItemView
{
    private $repo;
    function __construct() {
        $this->repo = new ScoreboardItemRepositoryImpl();
    }
    public function createNewScoreboardItem(string $name, string $score) {
        if (is_numeric($score)) {
            $intScore = intval($score);
            $this->repo->createScoreboardItem($name, $intScore);
            return true;
        } else {
            return false;
        }
    }

    public function getScores() {
        return $this->repo->getScoreboardItems();
    }
}