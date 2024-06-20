<?php
require_once 'Dice.php';

class YatzyGame {
    private $dices = [];
    private $dicestwo = [];
    private $dicepointerone = 0;
    private $dicepointertwo = 0;
    public $score1 = 0;
    public $score2 = 0;
    private $turn = 0;

    public function __construct() {
        $this->init();
    }

    public function init() {
        $this->dices = [];
        $this->dicestwo = [];
        $this->dicepointerone = 0;
        $this->dicepointertwo = 0;
        $this->score1 = 0;
        $this->score2 = 0;
        $this->turn = 0;

        for ($i = 0; $i < 5; $i++) {
            $this->dices[] = new Dice($i);
            $this->dicestwo[] = new Dice($i);
        }
    }

    public function roll($player) {
        if ($player == 1) {
            $dice = $this->dices[$this->dicepointerone];
        } else {
            $dice = $this->dicestwo[$this->dicepointertwo];
        }

        if ($dice->getStates() >= 2) {
            return "This dice has hit max number of rolls of 2";
        } else {
            $dice->rollDice();
        }

        return null;
    }

    public function next($player) {
        if ($player == 1) {
            if ($this->dicepointerone >= 4) {
                return "All 5 dice are rolled, it is the next person's turn";
            } else {
                $this->dicepointerone++;
            }
        } else {
            if ($this->dicepointertwo >= 4) {
                return "All 5 dice are rolled, it is the next person's turn";
            } else {
                $this->dicepointertwo++;
            }
        }
        return null;
    }

    public function nextTurn() {
        if ($this->turn > 5) {
            return "This is the last turn";
        } else {
            if ($this->dicepointerone < 4 || $this->dicepointertwo < 4) {
                return "Please wait all players finish this turn";
            } else {
                $this->turn++;
                $this->init();
            }
        }
        return null;
    }

    public function getDices($player) {
        $dicestring = "";
        if ($player == 1) {
            foreach ($this->dices as $dice) {
                $dicestring .= $dice->getDiceValue() . " ";
            }
        } else {
            foreach ($this->dicestwo as $dice) {
                $dicestring .= $dice->getDiceValue() . " ";
            }
        }
        return $dicestring;
    }

    // Add getter methods for private properties
    public function getDicesArray($player) {
        return ($player == 1) ? $this->dices : $this->dicestwo;
    }
}
