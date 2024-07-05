<?php

namespace app\yatzy;

class Dice {
    private $id;
    private $value;
    private $states;

    public function __construct($id) {
        $this->id = $id;
        $this->rollDice();
        $this->states = 0;
    }

    public function rollDice() {
        $this->value = rand(1, 6);
        $this->states++;
        return $this->value;
    }

    public function getDiceValue() {
        return $this->value;
    }

    public function getStates() {
        return $this->states;
    }

    public function reset() {
        $this->rollDice();
        $this->states = 0;
    }
}
?>
