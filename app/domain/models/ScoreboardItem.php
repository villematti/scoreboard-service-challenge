<?php
declare(strict_types=1);

namespace App\Domain\Models;

class ScoreboardItem {
    private $score = 0;
    private $name = "";

    function __construct(string $name, int $score)
    {
        $this->score = $score;
        $this->name = $name;
    }

    function getName() {
        return $this->name;
    }

    function getScore() {
        return $this->score;
    }
}