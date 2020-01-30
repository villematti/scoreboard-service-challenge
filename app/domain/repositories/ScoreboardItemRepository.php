<?php
declare(strict_types=1);

namespace App\Domain\Repositories;
use \App\Domain\Models\ScoreboardItem;

interface ScoreboardItemRepository {
    public function getScoreboardItems(): Array;
    public function createScoreboardItem(string $name, int $score): ScoreboardItem;
}