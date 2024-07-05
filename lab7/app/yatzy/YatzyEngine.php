<?php
class YatzyEngine {
    public static function calculateScore($game, $scoreBox) {
        $score = 0;
        switch ($scoreBox) {
            case 'ones':
                $score = self::sumOf($game, 1);
                break;
            case 'twos':
                $score = self::sumOf($game, 2);
                break;
            case 'threes':
                $score = self::sumOf($game, 3);
                break;
            case 'fours':
                $score = self::sumOf($game, 4);
                break;
            case 'fives':
                $score = self::sumOf($game, 5);
                break;
            case 'sixes':
                $score = self::sumOf($game, 6);
                break;
          
        }
        return $score;
    }

    private static function sumOf($game, $value) {
        $sum = 0;
        $dices = $game->getDicesArray(1);
        foreach ($dices as $dice) {
            if ($dice->getDiceValue() == $value) {
                $sum += $value;
            }
        }
        return $sum;
    }

    public static function updateOverallScore($game, $player, $scoreBox) {
        $score = self::calculateScore($game, $scoreBox);
        if ($player == 1) {
            $game->score1 += $score;
        } else {
            $game->score2 += $score;
        }
    }
}
