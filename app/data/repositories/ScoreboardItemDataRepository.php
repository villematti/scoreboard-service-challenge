<?php
declare(strict_types=1);

namespace App\Data\Repositories;
use \App\Domain\Models\ScoreboardItem;

interface ScoreboardItemDataRepository {
    public function saveScoreboardItem(ScoreboardItem $item): bool;
    public function loadScoreboardItems(): Array;
}