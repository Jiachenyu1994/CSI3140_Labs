<?php
namespace Yatzy\Test;

use Yatzy\YatzyGame;
use Yatzy\YatzyEngine;
use PHPUnit\Framework\TestCase;

class YatzyEngineTest extends TestCase
{
    public function testCalculateScore()
    {
        $game = new YatzyGame();
        $score = YatzyEngine::calculateScore($game, 'ones');
        $this->assertIsInt($score);
    }

    public function testUpdateOverallScore()
    {
        $game = new YatzyGame();
        YatzyEngine::updateOverallScore($game, 1, 'ones');
        $this->assertGreaterThanOrEqual(0, $game->score1);

        YatzyEngine::updateOverallScore($game, 2, 'ones');
        $this->assertGreaterThanOrEqual(0, $game->score2);
    }
}
