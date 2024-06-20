<?php
namespace Yatzy\Test;

use Yatzy\YatzyGame;
use PHPUnit\Framework\TestCase;

class YatzyGameTest extends TestCase
{
    public function testInit()
    {
        $game = new YatzyGame();
        $this->assertNotEmpty($game->getDicesArray(1));
        $this->assertNotEmpty($game->getDicesArray(2));
    }

    public function testRoll()
    {
        $game = new YatzyGame();
        $this->assertNull($game->roll(1));
        $this->assertNull($game->roll(2));
    }

    public function testNext()
    {
        $game = new YatzyGame();
        $this->assertNull($game->next(1));
        $this->assertNull($game->next(2));
    }

    public function testNextTurn()
    {
        $game = new YatzyGame();
        $this->assertNull($game->nextTurn());
    }

    public function testGetDices()
    {
        $game = new YatzyGame();
        $this->assertNotEmpty($game->getDices(1));
        $this->assertNotEmpty($game->getDices(2));
    }
}
